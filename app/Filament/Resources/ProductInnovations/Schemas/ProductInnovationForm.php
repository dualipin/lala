<?php

namespace App\Filament\Resources\ProductInnovations\Schemas;

use App\Enums\ProductChangeType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProductInnovationForm
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
                    ->required(),
                Select::make('change_type')
                    ->label('Tipo de cambio')
                    ->options(ProductChangeType::class)
                    ->required(),
                Textarea::make('description')
                    ->label('Descripción')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('effective_date')
                    ->label('Fecha de vigencia')
                    ->required(),
                SpatieMediaLibraryFileUpload::make('images')
                    ->label('Catálogo de imágenes (Evolución gráfica)')
                    ->collection('images')
                    ->image()
                    ->multiple()
                    ->enableReordering()
                    ->conversion('thumb')
                    ->maxFiles(10)
                    ->maxSize(5120)
                    ->panelLayout('integrated')
                    ->helperText('Sube el catálogo de imágenes que ilustran la evolución gráfica o visual del producto.')
                    ->columnSpanFull(),
            ]);
    }
}
