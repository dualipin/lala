<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Familia de producto')
                    ->relationship('category', 'name')
                    ->required(),
                TextInput::make('name')
                    ->label('Nombre comercial')
                    ->required()
                    ->maxLength(255),
                TextInput::make('price')
                    ->label('Precio')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->prefix('$'),
                TextInput::make('packaging')
                    ->label('Empaque')
                    ->required()
                    ->maxLength(255),
                TextInput::make('presentation')
                    ->label('Presentación')
                    ->required()
                    ->maxLength(255),
                TextInput::make('size')
                    ->label('Tamaño')
                    ->required()
                    ->maxLength(255),
                SpatieMediaLibraryFileUpload::make('image')
                    ->label('Imagen del producto')
                    ->collection('image')
                    ->image()
                    ->conversion('thumb')
                    ->maxSize(5120)
                    ->panelLayout('integrated')
                    ->helperText('Se permite una imagen por producto. Se genera una miniatura de 400 px para el catálogo.')
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }
}
