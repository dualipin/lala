<?php

namespace App\Filament\Resources\Inventories\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class InventoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('product_id')
                    ->label('Producto')
                    ->relationship('product', 'name')
                    ->searchable()
                    ->preload()
                    ->disabledOn('edit')
                    ->unique(ignoreRecord: true)
                    ->required(),
                TextInput::make('physical_stock')
                    ->label('Stock físico')
                    ->numeric()
                    ->disabled()
                    ->helperText('El stock físico se actualiza con los movimientos de inventario.'),
                TextInput::make('digital_stock')
                    ->label('Stock digital')
                    ->numeric()
                    ->disabled()
                    ->helperText('El stock digital se actualiza con los movimientos de inventario.'),
                DateTimePicker::make('last_counted_at')
                    ->label('Último conteo')
                    ->helperText('Fecha y hora del último conteo físico realizado.'),
            ]);
    }
}
