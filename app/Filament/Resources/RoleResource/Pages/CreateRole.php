<?php

namespace App\Filament\Resources\RoleResource\Pages;

use App\Filament\Resources\RoleResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRole extends CreateRecord
{
    protected static string $resource = RoleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getRedirectUrl()::getUrl('index'); // TODO: Change the autogenerated stub
    }
//    protected function mutateFormDataBeforeCreate(array $data): array
//    {
//        return parent::mutateFormDataBeforeCreate($data); // TODO: Change the autogenerated stub
//    }
}
