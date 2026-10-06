<?php

namespace App\Filament\Resources\Inventories\Tables;

use App\Models\Inventory;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InventoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')
                    ->label('Producto')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('physical_stock')
                    ->label('Stock físico')
                    ->numeric()
                    ->sortable()
                    ->color(fn (Inventory $record): string => $record->physical_stock > 0 ? 'success' : 'danger'),
                TextColumn::make('digital_stock')
                    ->label('Stock digital')
                    ->numeric()
                    ->sortable()
                    ->color(fn (Inventory $record): string => $record->digital_stock > 0 ? 'success' : 'danger'),
                TextColumn::make('last_counted_at')
                    ->label('Último conteo')
                    ->dateTime()
                    ->sortable()
                    ->placeholder('Sin conteo'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
