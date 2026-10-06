<?php

namespace App\Models;

use App\Enums\MovementType;
use Database\Factories\InventoryMovementFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * Movimiento de entrada o salida que alimenta el historial digital del inventario.
 */
#[Fillable(['inventory_id', 'type', 'quantity', 'description'])]
class InventoryMovement extends Model
{
    /** @use HasFactory<InventoryMovementFactory> */
    use HasFactory;

    protected function casts(): array
    {
        return [
            'type' => MovementType::class,
            'quantity' => 'integer',
        ];
    }

    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }

    protected static function booted(): void
    {
        static::creating(function (self $movement): void {
            $movement->applyStockChange();
        });
    }

    /**
     * Valida el movimiento y aplica su delta al stock físico y digital del inventario.
     *
     * @throws ValidationException
     */
    private function applyStockChange(): void
    {
        if ($this->inventory_id === null) {
            throw ValidationException::withMessages([
                'inventory_id' => 'El inventario es obligatorio.',
            ]);
        }

        if (! $this->type instanceof MovementType) {
            throw ValidationException::withMessages([
                'type' => 'El tipo de movimiento es obligatorio.',
            ]);
        }

        if ($this->quantity < 1) {
            throw ValidationException::withMessages([
                'quantity' => 'La cantidad debe ser al menos 1 unidad.',
            ]);
        }

        DB::transaction(function (): void {
            $inventory = Inventory::query()
                ->whereKey($this->inventory_id)
                ->lockForUpdate()
                ->firstOrFail();

            $physicalStock = $inventory->physical_stock + $this->type->delta($this->quantity);
            $digitalStock = $inventory->digital_stock + $this->type->delta($this->quantity);

            if ($physicalStock < 0 || $digitalStock < 0) {
                throw ValidationException::withMessages([
                    'quantity' => "Stock insuficiente: hay {$inventory->physical_stock} unidades en almacén y {$inventory->digital_stock} disponibles en la plataforma web.",
                ]);
            }

            $inventory->update([
                'physical_stock' => $physicalStock,
                'digital_stock' => $digitalStock,
            ]);
        });
    }
}
