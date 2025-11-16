<?php

namespace App\Filament\Resources\CrudExamples;

use App\Filament\Resources\CrudExamples\Pages\CreateCrudExample;
use App\Filament\Resources\CrudExamples\Pages\EditCrudExample;
use App\Filament\Resources\CrudExamples\Pages\ListCrudExamples;
use App\Filament\Resources\CrudExamples\Schemas\CrudExampleForm;
use App\Filament\Resources\CrudExamples\Tables\CrudExamplesTable;
use App\Models\CrudExample;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CrudExampleResource extends Resource
{
    protected static ?string $model = CrudExample::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedAtSymbol;

    protected static ?string $recordTitleAttribute = 'Contoh CRUD';

    protected static ?string $label = 'Contoh CRUD';

    public static function form(Schema $schema): Schema
    {
        return CrudExampleForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CrudExamplesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListCrudExamples::route('/'),
            'create' => CreateCrudExample::route('/create'),
            'edit' => EditCrudExample::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
