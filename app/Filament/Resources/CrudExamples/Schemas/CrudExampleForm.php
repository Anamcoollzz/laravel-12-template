<?php

namespace App\Filament\Resources\CrudExamples\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CrudExampleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('phone_number')
                    ->tel()
                    ->required(),
                DatePicker::make('birthdate')
                    ->required(),
                Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('avatar')
                    ->required(),
                TextInput::make('text')
                    ->required(),
                TextInput::make('barcode')
                    ->required(),
                TextInput::make('qr_code')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('number')
                    ->required()
                    ->numeric(),
                TextInput::make('currency')
                    ->required()
                    ->numeric(),
                TextInput::make('currency_idr')
                    ->required()
                    ->numeric(),
                TextInput::make('select')
                    ->required(),
                TextInput::make('select2')
                    ->required(),
                Textarea::make('select2_multiple')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('textarea')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('radio')
                    ->required(),
                TextInput::make('checkbox')
                    ->required(),
                TextInput::make('checkbox2')
                    ->required(),
                Textarea::make('tags')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('file')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('image')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('date')
                    ->required(),
                TimePicker::make('time')
                    ->required(),
                TextInput::make('color')
                    ->required(),
                Textarea::make('summernote_simple')
                    ->columnSpanFull(),
                Textarea::make('summernote')
                    ->columnSpanFull(),
                Textarea::make('tinymce')
                    ->columnSpanFull(),
                Textarea::make('ckeditor')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
                TextInput::make('created_by_id')
                    ->numeric(),
                TextInput::make('last_updated_by_id')
                    ->numeric(),
            ]);
    }
}
