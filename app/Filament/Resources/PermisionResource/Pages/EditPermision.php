<?php

namespace App\Filament\Resources\PermisionResource\Pages;

use App\Filament\Resources\PermisionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPermision extends EditRecord
{
    protected static string $resource = PermisionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
