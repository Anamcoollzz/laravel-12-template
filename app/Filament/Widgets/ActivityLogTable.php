<?php

namespace App\Filament\Widgets;

use App\Models\ActivityLog;
use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class ActivityLogTable extends TableWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(fn(): Builder => ActivityLog::query())
            ->columns([
                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                TextColumn::make('activity_type')
                    ->label('Tipe Aktivitas')
                    ->searchable(),
                TextColumn::make('ip')
                    ->label('IP Address')
                    ->searchable(),
                TextColumn::make('user_id')
                    ->label('Pengguna')
                    ->getStateUsing(fn(ActivityLog $record): string => $record->user ? $record->user->name . ' (' . $record->user->email . ')' : 'Guest')
                    ->searchable(),
                // TextColumn::make('user_id')
                //     ->numeric()
                //     ->sortable(),
                TextColumn::make('roles')
                    ->label('Peran')
                    ->searchable(),
                TextColumn::make('browser')
                    ->label('Browser')
                    ->searchable(),
                TextColumn::make('platform')
                    ->label('Platform')
                    ->searchable(),
                TextColumn::make('device')
                    ->label('Device')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime()
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
