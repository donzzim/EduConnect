<?php

namespace App\Helpers;

use App\Services\ViaCepService;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;

class UserProfileForm
{
    public static function makeTabs(string $roleLabel, string $roleValue, array $complementaryFields): Tabs
    {
        return Tabs::make('Cadastro')
            ->tabs([
                Tab::make('Dados pessoais')
                    ->icon(Heroicon::OutlinedUser)
                    ->badge('1')
                    ->badgeColor('primary')
                    ->schema([
                        Section::make('Identificação')
                            ->description('Informações principais do perfil do usuário.')
                            ->schema([
                                TextInput::make('user_name')
                                    ->label('Nome')
                                    ->placeholder('Digite o nome completo')
                                    ->required()
                                    ->maxLength(255)
                                    ->validationAttribute('nome')
                                    ->validationMessages([
                                        'required' => 'O nome é obrigatório.',
                                        'max_length' => 'O nome não pode ter mais de 255 caracteres.',
                                    ])
                                    ->columnSpanFull(),

                                DatePicker::make('user_birth_date')
                                    ->label('Data de nascimento')
                                    ->native()
                                    ->placeholder('Selecione a data')
                                    ->required()
                                    ->validationAttribute('data de nascimento')
                                    ->validationMessages([
                                        'required' => 'A data de nascimento é obrigatória.',
                                    ]),

                                Select::make('user_gender')
                                    ->label('Sexo')
                                    ->options([
                                        'male' => 'Masculino',
                                        'female' => 'Feminino',
                                        'other' => 'Outro',
                                    ])
                                    ->placeholder('Selecione')
                                    ->required()
                                    ->validationAttribute('sexo')
                                    ->validationMessages([
                                        'required' => 'O campo sexo é obrigatório.',
                                    ]),

                                TextInput::make('user_enrollment')
                                    ->label('Matrícula')
                                    ->placeholder('Ex.: 2026001234')
                                    ->required()
                                    ->maxLength(10)
                                    ->unique('users', 'enrollment', ignorable: fn ($record) => $record?->user)
                                    ->validationAttribute('matrícula')
                                    ->validationMessages([
                                        'required' => 'A matrícula é obrigatória.',
                                        'max_length' => 'A matrícula deve ter no máximo 10 caracteres.',
                                        'unique' => 'Esta matrícula já está cadastrada.',
                                    ]),

                                TextInput::make('user_registration_number')
                                    ->label('Documento (RG/CPF)')
                                    ->placeholder('Informe o RG ou CPF')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique('users', 'registration_number', ignorable: fn ($record) => $record?->user)
                                    ->validationAttribute('documento')
                                    ->validationMessages([
                                        'required' => 'O documento é obrigatório.',
                                        'max_length' => 'O documento não pode ter mais de 255 caracteres.',
                                        'unique' => 'Este documento já está cadastrado.',
                                    ]),
                            ])
                            ->columns([
                                'default' => 1,
                                'md' => 2,
                            ]),
                    ]),

                Tab::make('Dados de acesso')
                    ->icon(Heroicon::OutlinedKey)
                    ->badge('2')
                    ->badgeColor('info')
                    ->schema([
                        Section::make('Credenciais e perfil')
                            ->description('Dados de autenticação e vínculo de acesso no sistema.')
                            ->schema([
                                TextInput::make('user_email')
                                    ->label('E-mail')
                                    ->email()
                                    ->placeholder('email@exemplo.com')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->unique('users', 'email', ignorable: fn ($record) => $record?->user)
                                    ->validationAttribute('e-mail')
                                    ->validationMessages([
                                        'email' => 'Informe um e-mail válido.',
                                        'max_length' => 'O e-mail não pode ter mais de 255 caracteres.',
                                        'unique' => 'Este e-mail já está em uso.',
                                    ]),

                                TextInput::make('user_institutional_email')
                                    ->label('E-mail institucional')
                                    ->email()
                                    ->placeholder('usuario@instituicao.edu.br')
                                    ->nullable()
                                    ->maxLength(255)
                                    ->unique('users', 'institutional_email', ignorable: fn ($record) => $record?->user)
                                    ->validationAttribute('e-mail institucional')
                                    ->validationMessages([
                                        'email' => 'Informe um e-mail institucional válido.',
                                        'max_length' => 'O e-mail institucional não pode ter mais de 255 caracteres.',
                                        'unique' => 'Este e-mail institucional já está cadastrado.',
                                    ]),

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
                                    ->placeholder('Mínimo de 8 caracteres')
                                    ->required(fn (string $operation): bool => $operation === 'create')
                                    ->confirmed()
                                    ->minLength(8)
                                    ->maxLength(255)
                                    ->validationAttribute('senha')
                                    ->validationMessages([
                                        'required' => 'A senha é obrigatória.',
                                        'confirmed' => 'A confirmação de senha não confere.',
                                        'min_length' => 'A senha deve ter no mínimo 8 caracteres.',
                                        'max_length' => 'A senha não pode ter mais de 255 caracteres.',
                                    ])
                                    ->dehydrateStateUsing(fn (?string $state): ?string => blank($state) ? null : $state),

                                TextInput::make('user_password_confirmation')
                                    ->label('Confirme a senha')
                                    ->password()
                                    ->revealable()
                                    ->placeholder('Repita a senha informada')
                                    ->required(fn (string $operation): bool => $operation === 'create')
                                    ->validationAttribute('confirmação de senha')
                                    ->validationMessages([
                                        'required' => 'A confirmação de senha é obrigatória.',
                                    ])
                                    ->dehydrated(false)
                                    ->columnSpanFull(),
                            ])
                            ->columns([
                                'default' => 1,
                                'md' => 2,
                            ]),
                    ]),

                Tab::make('Endereço')
                    ->icon(Heroicon::OutlinedMapPin)
                    ->badge('3')
                    ->badgeColor('warning')
                    ->schema([
                        Section::make('Localização')
                            ->description('Preencha manualmente ou utilize o CEP para completar os dados.')
                            ->schema([
                                TextInput::make('user_address.cep')
                                    ->label('CEP')
                                    ->placeholder('00000-000')
                                    ->mask('99999-999')
                                    ->maxLength(9)
                                    ->validationAttribute('CEP')
                                    ->validationMessages([
                                        'max_length' => 'O CEP deve estar no formato 00000-000.',
                                    ])
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function ($state, callable $set, callable $get): void {
                                        if (blank($state)) {
                                            return;
                                        }

                                        $normalizedCep = preg_replace('/\D+/', '', (string) $state);

                                        if (strlen($normalizedCep) !== 8) {
                                            Notification::make()
                                                ->title('CEP inválido')
                                                ->body('Informe um CEP com 8 dígitos para buscar o endereço.')
                                                ->warning()
                                                ->send();

                                            return;
                                        }

                                        try {
                                            $address = app(ViaCepService::class)->search((string) $state);

                                            $set('user_address.cep', $address['cep']);

                                            $set(
                                                'user_address.logradouro',
                                                $address['logradouro'] ?? $get('user_address.logradouro')
                                            );

                                            $set(
                                                'user_address.bairro',
                                                $address['bairro'] ?? $get('user_address.bairro')
                                            );

                                            $set(
                                                'user_address.cidade',
                                                $address['cidade'] ?? $get('user_address.cidade')
                                            );

                                            $set(
                                                'user_address.uf',
                                                $address['uf'] ?? $get('user_address.uf')
                                            );

                                            $set(
                                                'user_address.complemento',
                                                $address['complemento'] ?? $get('user_address.complemento')
                                            );

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
                                    ->placeholder('Rua, avenida, praça...')
                                    ->maxLength(255)
                                    ->validationAttribute('logradouro')
                                    ->validationMessages([
                                        'max_length' => 'O logradouro não pode ter mais de 255 caracteres.',
                                    ])
                                    ->columnSpan([
                                        'default' => 1,
                                        'md' => 2,
                                    ]),

                                TextInput::make('user_address.numero')
                                    ->label('Número')
                                    ->placeholder('Ex.: 123')
                                    ->maxLength(20)
                                    ->validationAttribute('número')
                                    ->validationMessages([
                                        'max_length' => 'O número não pode ter mais de 20 caracteres.',
                                    ]),

                                TextInput::make('user_address.bairro')
                                    ->label('Bairro')
                                    ->placeholder('Digite o bairro')
                                    ->maxLength(255)
                                    ->validationAttribute('bairro')
                                    ->validationMessages([
                                        'max_length' => 'O bairro não pode ter mais de 255 caracteres.',
                                    ]),

                                TextInput::make('user_address.cidade')
                                    ->label('Cidade')
                                    ->placeholder('Digite a cidade')
                                    ->maxLength(255)
                                    ->validationAttribute('cidade')
                                    ->validationMessages([
                                        'max_length' => 'A cidade não pode ter mais de 255 caracteres.',
                                    ]),

                                Select::make('user_address.uf')
                                    ->label('UF')
                                    ->options([
                                        'AC' => 'Acre',
                                        'AL' => 'Alagoas',
                                        'AP' => 'Amapá',
                                        'AM' => 'Amazonas',
                                        'BA' => 'Bahia',
                                        'CE' => 'Ceará',
                                        'DF' => 'Distrito Federal',
                                        'ES' => 'Espírito Santo',
                                        'GO' => 'Goiás',
                                        'MA' => 'Maranhão',
                                        'MT' => 'Mato Grosso',
                                        'MS' => 'Mato Grosso do Sul',
                                        'MG' => 'Minas Gerais',
                                        'PA' => 'Pará',
                                        'PB' => 'Paraíba',
                                        'PR' => 'Paraná',
                                        'PE' => 'Pernambuco',
                                        'PI' => 'Piauí',
                                        'RJ' => 'Rio de Janeiro',
                                        'RN' => 'Rio Grande do Norte',
                                        'RS' => 'Rio Grande do Sul',
                                        'RO' => 'Rondônia',
                                        'RR' => 'Roraima',
                                        'SC' => 'Santa Catarina',
                                        'SP' => 'São Paulo',
                                        'SE' => 'Sergipe',
                                        'TO' => 'Tocantins',
                                    ])
                                    ->validationAttribute('UF'),

                                TextInput::make('user_address.complemento')
                                    ->label('Complemento')
                                    ->placeholder('Apartamento, bloco, referência...')
                                    ->maxLength(255)
                                    ->validationAttribute('complemento')
                                    ->validationMessages([
                                        'max_length' => 'O complemento não pode ter mais de 255 caracteres.',
                                    ])
                                    ->columnSpanFull(),
                            ])
                            ->columns([
                                'default' => 1,
                                'md' => 2,
                            ]),
                    ]),

                Tab::make('Informações complementares')
                    ->icon(Heroicon::OutlinedClipboardDocumentList)
                    ->badge('4')
                    ->badgeColor('success')
                    ->schema([
                        Section::make('Detalhes adicionais')
                            ->description('Informações complementares relacionadas ao cadastro.')
                            ->schema($complementaryFields)
                            ->columns([
                                'default' => 1,
                                'md' => 2,
                            ]),
                    ]),
            ])
            ->contained(false)
            ->persistTab()
            ->id('user-registration-tabs')
            ->columnSpanFull();
    }
}
