<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\UserRole;
use App\Services\ViaCepService;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([Tabs::make('Cadastro de usuário')
            ->tabs([
                Tab::make('Dados pessoais')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('birth_date')
                            ->label('Data de nascimento')
                            ->required(),
                        TextInput::make('enrollment')
                            ->label('Matrícula')
                            ->required()
                            ->maxLength(10)
                            ->unique('users', 'enrollment', ignoreRecord: true),
                        TextInput::make('registration_number')
                            ->label('Documento (RG/CPF)')
                            ->required()
                            ->maxLength(255)
                            ->unique('users', 'registration_number', ignoreRecord: true),
                        Select::make('gender')
                            ->label('Sexo')
                            ->options([
                                'male' => 'Masculino',
                                'female' => 'Feminino',
                                'other' => 'Outro',
                            ])
                            ->required(),
                    ])
                    ->columns(2),
                Tab::make('Dados de acesso / usuário')
                    ->schema([
                        Select::make('role')
                            ->label('Perfil')
                            ->required()
                            ->live()
                            ->options([
                                UserRole::Student->value => 'Aluno',
                                UserRole::Teacher->value => 'Professor',
                                UserRole::Admin->value => 'Admin',
                            ]),
                        TextInput::make('email')
                            ->label('E-mail')
                            ->email()
                            ->nullable()
                            ->maxLength(255)
                            ->unique('users', 'email', ignoreRecord: true),
                        TextInput::make('institutional_email')
                            ->label('E-mail institucional')
                            ->email()
                            ->nullable()
                            ->maxLength(255)
                            ->unique('users', 'institutional_email', ignoreRecord: true),
                        TextInput::make('password')
                            ->label('Senha')
                            ->password()
                            ->revealable()
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->confirmed()
                            ->minLength(8)
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn (?string $state): ?string => blank($state) ? null : $state),
                        TextInput::make('password_confirmation')
                            ->label('Confirme a senha')
                            ->password()
                            ->revealable()
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->dehydrated(false),
                    ])
                    ->columns(2),
                Tab::make('Endereço')
                    ->schema([
                        TextInput::make('address.cep')
                            ->label('CEP')
                            ->mask('99999-999')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set): void {
                                if (blank($state)) {
                                    return;
                                }

                                try {
                                    $address = app(ViaCepService::class)->search((string) $state);

                                    $set('address.cep', $address['cep']);
                                    $set('address.logradouro', $address['logradouro']);
                                    $set('address.bairro', $address['bairro']);
                                    $set('address.cidade', $address['cidade']);
                                    $set('address.uf', $address['uf']);
                                    $set('address.complemento', $address['complemento']);

                                    Notification::make()
                                        ->title('CEP localizado com sucesso.')
                                        ->success()
                                        ->send();
                                } catch (\Throwable $exception) {
                                    Notification::make()
                                        ->title('Falha ao buscar CEP')
                                        ->body($exception->getMessage())
                                        ->danger()
                                        ->send();
                                }
                            }),
                        TextInput::make('address.logradouro')
                            ->label('Logradouro')
                            ->maxLength(255),
                        TextInput::make('address.numero')
                            ->label('Número')
                            ->maxLength(20),
                        TextInput::make('address.bairro')
                            ->label('Bairro')
                            ->maxLength(255),
                        TextInput::make('address.cidade')
                            ->label('Cidade')
                            ->maxLength(255),
                        TextInput::make('address.uf')
                            ->label('UF')
                            ->maxLength(2),
                        TextInput::make('address.complemento')
                            ->label('Complemento')
                            ->maxLength(255),
                    ])
                    ->columns(2),
                Tab::make('Informações complementares')
                    ->schema([
                        Select::make('student_status')
                            ->label('Status acadêmico')
                            ->options([
                                'enrolled' => 'Matriculado',
                                'passed' => 'Aprovado',
                                'failed' => 'Reprovado',
                            ])
                            ->required(fn ($get): bool => $get('role') === UserRole::Student->value)
                            ->default('enrolled')
                            ->visible(fn ($get): bool => $get('role') === UserRole::Student->value),
                        Select::make('student_classroom_id')
                            ->label('Turma')
                            ->options(\App\Models\Classroom::query()->pluck('name', 'id')->all())
                            ->searchable()
                            ->nullable()
                            ->visible(fn ($get): bool => $get('role') === UserRole::Student->value),
                        TextInput::make('student_guardian')
                            ->label('Responsável')
                            ->maxLength(255)
                            ->visible(fn ($get): bool => $get('role') === UserRole::Student->value),
                        TextInput::make('student_guardian_contact')
                            ->label('Contato do responsável')
                            ->required(fn ($get): bool => $get('role') === UserRole::Student->value)
                            ->maxLength(255)
                            ->visible(fn ($get): bool => $get('role') === UserRole::Student->value),
                        TextInput::make('teacher_specialization')
                            ->label('Especialização')
                            ->maxLength(255)
                            ->visible(fn ($get): bool => $get('role') === UserRole::Teacher->value),
                        TextInput::make('teacher_specialization_college')
                            ->label('Instituição da especialização')
                            ->maxLength(255)
                            ->visible(fn ($get): bool => $get('role') === UserRole::Teacher->value),
                        TextInput::make('teacher_workload')
                            ->label('Carga horária (horas)')
                            ->numeric()
                            ->required(fn ($get): bool => $get('role') === UserRole::Teacher->value)
                            ->minValue(1)
                            ->visible(fn ($get): bool => $get('role') === UserRole::Teacher->value),
                        TextInput::make('teacher_salary')
                            ->label('Salário')
                            ->numeric()
                            ->required(fn ($get): bool => $get('role') === UserRole::Teacher->value)
                            ->minValue(0)
                            ->visible(fn ($get): bool => $get('role') === UserRole::Teacher->value),
                        TextInput::make('admin_workload')
                            ->label('Carga horária (horas)')
                            ->numeric()
                            ->required(fn ($get): bool => $get('role') === UserRole::Admin->value)
                            ->minValue(1)
                            ->visible(fn ($get): bool => $get('role') === UserRole::Admin->value),
                        TextInput::make('admin_salary')
                            ->label('Salário')
                            ->numeric()
                            ->required(fn ($get): bool => $get('role') === UserRole::Admin->value)
                            ->minValue(0)
                            ->visible(fn ($get): bool => $get('role') === UserRole::Admin->value),
                        Select::make('admin_position')
                            ->label('Cargo')
                            ->options([
                                'coordinator' => 'Coordenador(a)',
                                'principal' => 'Diretor(a)',
                            ])
                            ->required(fn ($get): bool => $get('role') === UserRole::Admin->value)
                            ->visible(fn ($get): bool => $get('role') === UserRole::Admin->value),
                    ])
                    ->columns(2),
            ])
            ->columnSpanFull()
        ]);
    }
}
