<?php

namespace App\Filament\Resources\CrudExamples\Pages;

use App\Filament\Resources\CrudExamples\CrudExampleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCrudExamples extends ListRecords
{
    protected static string $resource = CrudExampleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
