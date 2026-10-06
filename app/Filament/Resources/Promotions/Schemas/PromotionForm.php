<?php

namespace App\Filament\Resources\Promotions\Schemas;

use App\Enums\DiscountType;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class PromotionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Select::make('discount_type')
                    ->label('Tipo de descuento')
                    ->options(DiscountType::class)
                    ->default(DiscountType::Percent)
                    ->live()
                    ->required(),
                TextInput::make('discount_value')
                    ->label('Valor del descuento')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(fn (Get $get): ?int => in_array($get('discount_type'), [DiscountType::Percent, DiscountType::Percent->value], true) ? 100 : null)
                    ->prefix(fn (Get $get): ?string => in_array($get('discount_type'), [DiscountType::Fixed, DiscountType::Fixed->value], true) ? '$' : null)
                    ->suffix(fn (Get $get): ?string => in_array($get('discount_type'), [DiscountType::Percent, DiscountType::Percent->value], true) ? '%' : null)
                    ->required(),
                DateTimePicker::make('starts_at')
                    ->label('Inicio de vigencia')
                    ->seconds(false)
                    ->required(),
                DateTimePicker::make('ends_at')
                    ->label('Fin de vigencia')
                    ->seconds(false)
                    ->afterOrEqual('starts_at')
                    ->required(),
                Toggle::make('is_active')
                    ->label('Promoción activa')
                    ->default(true),
                Textarea::make('description')
                    ->label('Descripción')
                    ->rows(3)
                    ->columnSpanFull(),
                Select::make('products')
                    ->label('Productos en promoción')
                    ->relationship('products', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->required()
                    ->columnSpanFull(),
                SpatieMediaLibraryFileUpload::make('banner')
                    ->label('Imagen principal (banner)')
                    ->collection('banner')
                    ->image()
                    ->conversion('thumb')
                    ->maxSize(5120)
                    ->helperText('Se permite una imagen por promoción. Se genera una miniatura de 400 px.')
                    ->columnSpan(['default' => 1]),
                SpatieMediaLibraryFileUpload::make('videos')
                    ->label('Videos promocionales')
                    ->collection('videos')
                    ->multiple()
                    ->acceptedFileTypes(['video/mp4', 'video/webm'])
                    ->maxSize(51200)
                    ->helperText('Formatos MP4 o WebM, hasta 50 MB por video.')
                    ->columnSpan(['default' => 1]),
                SpatieMediaLibraryFileUpload::make('gallery')
                    ->label('Galería de imágenes')
                    ->collection('gallery')
                    ->image()
                    ->multiple()
                    ->enableReordering()
                    ->conversion('thumb')
                    ->maxFiles(10)
                    ->maxSize(5120)
                    ->helperText('Hasta 10 imágenes. Se pueden reordenar arrastrando.')
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }
}
