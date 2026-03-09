<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Services\ViaCepService;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;

class UserProfileForm
{
    public static function makeTabs(string $roleLabel, string $roleValue, array $complementaryFields): Tabs
    {
        return Tabs::make('Cadastro')
            ->tabs([
                Tab::make('Dados pessoais')
                    ->schema([
                        TextInput::make('user_name')
                            ->label('Nome')
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('user_birth_date')
                            ->label('Data de nascimento')
                            ->required(),
                        TextInput::make('user_enrollment')
                            ->label('Matrícula')
                            ->required()
                            ->maxLength(10)
                            ->unique('users', 'enrollment', ignorable: fn ($record) => $record?->user),
                        TextInput::make('user_registration_number')
                            ->label('Documento (RG/CPF)')
                            ->required()
                            ->maxLength(255)
                            ->unique('users', 'registration_number', ignorable: fn ($record) => $record?->user),
                        Select::make('user_gender')
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
                        TextInput::make('user_email')
                            ->label('E-mail')
                            ->email()
                            ->nullable()
                            ->maxLength(255)
                            ->unique('users', 'email', ignorable: fn ($record) => $record?->user),
                        TextInput::make('user_institutional_email')
                            ->label('E-mail institucional')
                            ->email()
                            ->nullable()
                            ->maxLength(255)
                            ->unique('users', 'institutional_email', ignorable: fn ($record) => $record?->user),
                        Select::make('user_role')
                            ->label('Perfil')
                            ->options([$roleValue => $roleLabel])
                            ->default($roleValue)
                            ->dehydrated()
                            ->disabled(),
                        TextInput::make('user_password')
                            ->label('Senha')
                            ->password()
                            ->revealable()
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->confirmed()
                            ->minLength(8)
                            ->maxLength(255)
                            ->dehydrateStateUsing(fn (?string $state): ?string => blank($state) ? null : $state),
                        TextInput::make('user_password_confirmation')
                            ->label('Confirme a senha')
                            ->password()
                            ->revealable()
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->dehydrated(false),
                    ])
                    ->columns(2),
                Tab::make('Endereço')
                    ->schema([
                        TextInput::make('user_address.cep')
                            ->label('CEP')
                            ->mask('99999-999')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, callable $set): void {
                                if (blank($state)) {
                                    return;
                                }

                                try {
                                    $address = app(ViaCepService::class)->search((string) $state);

                                    $set('user_address.cep', $address['cep']);
                                    $set('user_address.logradouro', $address['logradouro']);
                                    $set('user_address.bairro', $address['bairro']);
                                    $set('user_address.cidade', $address['cidade']);
                                    $set('user_address.uf', $address['uf']);
                                    $set('user_address.complemento', $address['complemento']);

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
                        TextInput::make('user_address.logradouro')
                            ->label('Logradouro')
                            ->maxLength(255),
                        TextInput::make('user_address.numero')
                            ->label('Número')
                            ->maxLength(20),
                        TextInput::make('user_address.bairro')
                            ->label('Bairro')
                            ->maxLength(255),
                        TextInput::make('user_address.cidade')
                            ->label('Cidade')
                            ->maxLength(255),
                        TextInput::make('user_address.uf')
                            ->label('UF')
                            ->maxLength(2),
                        TextInput::make('user_address.complemento')
                            ->label('Complemento')
                            ->maxLength(255),
                    ])
                    ->columns(2),
                Tab::make('Informações complementares')
                    ->schema($complementaryFields)
                    ->columns(2),
            ])
            ->columnSpanFull();
    }
}
