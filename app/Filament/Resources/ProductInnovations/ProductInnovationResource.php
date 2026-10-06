<?php

namespace App\Filament\Resources\ProductInnovations;

use App\Filament\Resources\ProductInnovations\Pages\CreateProductInnovation;
use App\Filament\Resources\ProductInnovations\Pages\EditProductInnovation;
use App\Filament\Resources\ProductInnovations\Pages\ListProductInnovations;
use App\Filament\Resources\ProductInnovations\Schemas\ProductInnovationForm;
use App\Filament\Resources\ProductInnovations\Tables\ProductInnovationsTable;
use App\Models\ProductInnovation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ProductInnovationResource extends Resource
{
    protected static ?string $model = ProductInnovation::class;

    protected static ?string $modelLabel = 'innovación de producto';

    protected static ?string $pluralModelLabel = 'innovaciones de producto';

    protected static ?string $navigationLabel = 'Innovaciones';

    protected static string|UnitEnum|null $navigationGroup = 'Catálogo';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSparkles;

    protected static ?string $recordTitleAttribute = 'description';

    public static function form(Schema $schema): Schema
    {
        return ProductInnovationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProductInnovationsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProductInnovations::route('/'),
            'create' => CreateProductInnovation::route('/create'),
            'edit' => EditProductInnovation::route('/{record}/edit'),
        ];
    }
}
