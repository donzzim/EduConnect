<?php

namespace App\Filament\Resources\Admins\Schemas;

use App\Filament\Resources\ProfileSupport\UserProfileForm;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AdminForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                UserProfileForm::makeTabs('Admin', 'admin', [
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
                    Select::make('position')
                        ->label('Cargo')
                        ->required()
                        ->options([
                            'coordinator' => 'Coordenador(a)',
                            'principal' => 'Diretor(a)',
                        ]),
                ]),
            ]);
    }
}
