<?php

namespace App\Filament\Resources\PermisionResource\Pages;

use App\Filament\Resources\PermisionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPermisions extends ListRecords
{
    protected static string $resource = PermisionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
