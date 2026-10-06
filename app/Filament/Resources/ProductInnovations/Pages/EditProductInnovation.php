<?php

namespace App\Filament\Resources\ProductInnovations\Pages;

use App\Filament\Resources\ProductInnovations\ProductInnovationResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditProductInnovation extends EditRecord
{
    protected static string $resource = ProductInnovationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
