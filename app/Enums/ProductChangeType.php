<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ProductChangeType: string implements HasColor, HasLabel
{
    case Empaque = 'empaque';

    case Presentacion = 'presentacion';

    case Tamano = 'tamano';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Empaque => 'Cambio de empaque',
            self::Presentacion => 'Cambio de presentación',
            self::Tamano => 'Cambio de tamaño',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::Empaque => 'info',
            self::Presentacion => 'warning',
            self::Tamano => 'gray',
        };
    }
}
