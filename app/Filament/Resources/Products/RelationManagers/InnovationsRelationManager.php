<?php

namespace App\Filament\Resources\Products\RelationManagers;

use App\Enums\ProductChangeType;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class InnovationsRelationManager extends RelationManager
{
    protected static bool $isLazy = false;

    protected static string $relationship = 'innovations';

    protected static ?string $title = 'Evolución del producto';

    protected static ?string $modelLabel = 'evolución';

    protected static ?string $pluralModelLabel = 'evoluciones';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('change_type')
                    ->label('Tipo de cambio')
                    ->options(ProductChangeType::class)
                    ->required(),
                DatePicker::make('effective_date')
                    ->label('Fecha de vigencia')
                    ->default(now())
                    ->required(),
                Textarea::make('description')
                    ->label('Descripción de la evolución')
                    ->rows(3)
                    ->required()
                    ->columnSpanFull(),
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

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('description')
            ->columns([
                SpatieMediaLibraryImageColumn::make('images')
                    ->label('Catálogo')
                    ->collection('images')
                    ->conversion('thumb')
                    ->circular()
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText(),
                TextColumn::make('change_type')
                    ->label('Tipo de cambio')
                    ->badge(),
                TextColumn::make('description')
                    ->label('Descripción')
                    ->limit(50)
                    ->wrap(),
                TextColumn::make('effective_date')
                    ->label('Vigente desde')
                    ->date()
                    ->sortable(),
            ])
            ->defaultSort('effective_date', 'desc')
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make()
                    ->label('Nueva evolución'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
