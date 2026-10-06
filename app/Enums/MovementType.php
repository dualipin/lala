<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum MovementType: string implements HasColor, HasLabel
{
    case Entrada = 'entrada';

    case Salida = 'salida';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Entrada => 'Entrada',
            self::Salida => 'Salida',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::Entrada => 'success',
            self::Salida => 'danger',
        };
    }

    public function delta(int $quantity): int
    {
        return match ($this) {
            self::Entrada => $quantity,
            self::Salida => -$quantity,
        };
    }
}
