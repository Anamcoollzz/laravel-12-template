<?php

namespace App\Filament\Resources\CrudExamples\Pages;

use App\Filament\Resources\CrudExamples\CrudExampleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditCrudExample extends EditRecord
{
    protected static string $resource = CrudExampleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
