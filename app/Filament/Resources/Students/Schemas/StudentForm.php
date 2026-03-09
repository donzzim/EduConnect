<?php

namespace App\Filament\Resources\Students\Schemas;

use App\Helpers\UserProfileForm;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class StudentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                UserProfileForm::makeTabs('Aluno', 'student', [
                    Select::make('classroom_id')
                        ->label('Turma')
                        ->relationship('classroom', 'name')
                        ->searchable()
                        ->preload()
                        ->nullable(),
                    Select::make('status')
                        ->label('Status acadêmico')
                        ->options([
                            'enrolled' => 'Matriculado',
                            'passed' => 'Aprovado',
                            'failed' => 'Reprovado',
                        ])
                        ->required()
                        ->default('enrolled'),
                    TextInput::make('guardian')
                        ->label('Responsável')
                        ->maxLength(255),
                    TextInput::make('guardian_contact')
                        ->label('Contato do responsável')
                        ->required()
                        ->maxLength(255),
                ]),
            ]);
    }
}
