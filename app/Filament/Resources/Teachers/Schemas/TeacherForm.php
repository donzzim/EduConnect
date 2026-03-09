<?php

namespace App\Filament\Resources\Teachers\Schemas;

use App\Helpers\UserProfileForm;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TeacherForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                UserProfileForm::makeTabs('Professor', 'teacher', [
                    TextInput::make('specialization')
                        ->label('Especialização')
                        ->maxLength(255),
                    TextInput::make('specialization_college')
                        ->label('Instituição da especialização')
                        ->maxLength(255),
                    TextInput::make('workload')
                        ->label('Carga horária (horas)')
                        ->numeric()
                        ->required()
                        ->minValue(1),
                    TextInput::make('salary')
                        ->label('Salário')
                        ->numeric()
                        ->required()
                        ->minValue(0),
                ]),
            ]);
    }
}
