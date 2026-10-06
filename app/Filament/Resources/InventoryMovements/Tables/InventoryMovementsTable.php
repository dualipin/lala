<?php

namespace App\Filament\Resources\InventoryMovements\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InventoryMovementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('inventory.product.name')
                    ->label('Producto')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Tipo')
                    ->badge(),
                TextColumn::make('quantity')
                    ->label('Cantidad')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Descripción')
                    ->limit(50)
                    ->wrap()
                    ->placeholder('Sin descripción'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([])
            ->toolbarActions([])
            ->modifyQueryUsing(fn ($query) => $query->with(['inventory.product']));
    }
}
