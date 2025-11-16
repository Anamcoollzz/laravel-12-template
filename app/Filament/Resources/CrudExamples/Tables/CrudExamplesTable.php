<?php

namespace App\Filament\Resources\CrudExamples\Tables;

use App\Models\CrudExample;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class CrudExamplesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->query(
                CrudExample::query()->with(['creator', 'editor'])
            )
            ->columns([
                TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),
                TextColumn::make('phone_number')
                    ->label('Nomor Telepon')
                    ->searchable(),
                TextColumn::make('birthdate')
                    ->label('Tanggal Lahir')
                    ->date()
                    ->sortable(),
                // TextColumn::make('avatar')
                //     ->searchable(),
                ImageColumn::make('avatar')
                    ->label('Avatar')
                    ->circular()
                    ->searchable(),
                TextColumn::make('text')
                    ->searchable(),
                TextColumn::make('barcode')
                    ->searchable(),
                TextColumn::make('qr_code')
                    ->label('QR Code')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('number')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('currency')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('currency_idr')
                    ->label('Currency IDR')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('select')
                    ->searchable(),
                TextColumn::make('select2')
                    ->searchable(),
                TextColumn::make('radio')
                    ->searchable(),
                TextColumn::make('checkbox')
                    ->searchable(),
                TextColumn::make('checkbox2')
                    ->searchable(),
                TextColumn::make('date')
                    ->date()
                    ->sortable(),
                TextColumn::make('time')
                    ->time()
                    ->sortable(),
                TextColumn::make('color')
                    ->searchable(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('created_by_id')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('last_updated_by_id')
                //     ->numeric()
                //     ->sortable(),
                TextColumn::make('created_by_id')
                    ->label('Created By')
                    ->getStateUsing(fn($record) => $record->creator ? $record->creator->name . ' (' . $record->creator->email . ')' : 'System')
                    ->sortable(),
                TextColumn::make('last_updated_by_id')
                    ->label('Last Updated By')
                    ->getStateUsing(fn($record) => $record->editor ? $record->editor->name . ' (' . $record->editor->email . ')' : 'System')
                    ->sortable(),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
