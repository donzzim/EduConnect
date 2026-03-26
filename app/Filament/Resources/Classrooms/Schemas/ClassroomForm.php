<?php

namespace App\Filament\Resources\Classrooms\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClassroomForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nome da turma')
                    ->required()
                    ->maxLength(255),
                Select::make('shift')
                    ->label('Turno')
                    ->options([
                        'morning' => 'Manhã',
                        'afternoon' => 'Tarde',
                        'night' => 'Noite',
                    ])
                    ->required()
                    ->native(false),
                TextInput::make('school_year')
                    ->label('Ano letivo')
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(2100)
                    ->default((int) now()->format('Y'))
                    ->required(),
            ]);
    }
}
