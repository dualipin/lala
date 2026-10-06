<?php

namespace App\Filament\Resources\ProductInnovations\Pages;

use App\Filament\Resources\ProductInnovations\ProductInnovationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProductInnovations extends ListRecords
{
    protected static string $resource = ProductInnovationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
