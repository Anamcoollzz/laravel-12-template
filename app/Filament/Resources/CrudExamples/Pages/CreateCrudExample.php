<?php

namespace App\Filament\Resources\CrudExamples\Pages;

use App\Filament\Resources\CrudExamples\CrudExampleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCrudExample extends CreateRecord
{
    protected static string $resource = CrudExampleResource::class;
}
