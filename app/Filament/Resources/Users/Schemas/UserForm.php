<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Enums\UserRole;
use App\Models\Classroom;
use App\Services\ViaCepService;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Cadastro de usuário')
                    ->tabs([
                        Tab::make('Dados pessoais')
                            ->icon(Heroicon::OutlinedUser)
                            ->badge('1')
                            ->badgeColor('primary')
                            ->schema([
                                Section::make('Identificação')
                                    ->description('Informações principais do perfil do usuário.')
                                    ->schema([
                                        TextInput::make('name')
                                            ->label('Nome')
                                            ->placeholder('Digite o nome completo')
                                            ->required()
                                            ->maxLength(255)
                                            ->columnSpanFull(),

                                        DatePicker::make('birth_date')
                                            ->label('Data de nascimento')
                                            ->placeholder('Selecione a data')
                                            ->required(),

                                        TextInput::make('enrollment')
                                            ->label('Matrícula')
                                            ->placeholder('Ex.: 2026001234')
                                            ->required()
                                            ->maxLength(10)
                                            ->unique('users', 'enrollment', ignoreRecord: true),

                                        TextInput::make('registration_number')
                                            ->label('Documento (RG/CPF)')
                                            ->placeholder('Informe o RG ou CPF')
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
                                            ->placeholder('Selecione')
                                            ->required(),
                                    ])
                                    ->columns([
                                        'default' => 1,
                                        'md' => 2,
                                    ]),
                            ]),

                        Tab::make('Dados de acesso / usuário')
                            ->icon(Heroicon::OutlinedKey)
                            ->badge('2')
                            ->badgeColor('info')
                            ->schema([
                                Section::make('Credenciais e perfil')
                                    ->description('Dados de autenticação e vínculo de acesso no sistema.')
                                    ->schema([
                                        Select::make('role')
                                            ->label('Perfil')
                                            ->placeholder('Selecione o perfil')
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
                                            ->placeholder('email@exemplo.com')
                                            ->nullable()
                                            ->maxLength(255)
                                            ->unique('users', 'email', ignoreRecord: true),

                                        TextInput::make('institutional_email')
                                            ->label('E-mail institucional')
                                            ->email()
                                            ->placeholder('usuario@instituicao.edu.br')
                                            ->nullable()
                                            ->maxLength(255)
                                            ->unique('users', 'institutional_email', ignoreRecord: true),

                                        TextInput::make('password')
                                            ->label('Senha')
                                            ->password()
                                            ->revealable()
                                            ->placeholder('Mínimo de 8 caracteres')
                                            ->required(fn(string $operation): bool => $operation === 'create')
                                            ->confirmed()
                                            ->minLength(8)
                                            ->maxLength(255)
                                            ->dehydrateStateUsing(fn(?string $state): ?string => blank($state) ? null : $state),

                                        TextInput::make('password_confirmation')
                                            ->label('Confirme a senha')
                                            ->password()
                                            ->revealable()
                                            ->placeholder('Repita a senha informada')
                                            ->required(fn(string $operation): bool => $operation === 'create')
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
                                        TextInput::make('address.cep')
                                            ->label('CEP')
                                            ->placeholder('00000-000')
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
                                            ->placeholder('Rua, avenida, praça...')
                                            ->maxLength(255)
                                            ->columnSpan([
                                                'default' => 1,
                                                'md' => 2,
                                            ]),

                                        TextInput::make('address.numero')
                                            ->label('Número')
                                            ->placeholder('Ex.: 123')
                                            ->maxLength(20),

                                        TextInput::make('address.bairro')
                                            ->label('Bairro')
                                            ->placeholder('Digite o bairro')
                                            ->maxLength(255),

                                        TextInput::make('address.cidade')
                                            ->label('Cidade')
                                            ->placeholder('Digite a cidade')
                                            ->maxLength(255),

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
                                            ]),

                                        TextInput::make('address.complemento')
                                            ->label('Complemento')
                                            ->placeholder('Apartamento, bloco, referência...')
                                            ->maxLength(255)
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
                                    ->schema([
                                        Select::make('student_status')
                                            ->label('Status acadêmico')
                                            ->placeholder('Selecione o status')
                                            ->options([
                                                'enrolled' => 'Matriculado',
                                                'passed' => 'Aprovado',
                                                'failed' => 'Reprovado',
                                            ])
                                            ->required(fn($get): bool => $get('role') === UserRole::Student->value)
                                            ->default('enrolled')
                                            ->visible(fn($get): bool => $get('role') === UserRole::Student->value),

                                        Select::make('student_classroom_id')
                                            ->label('Turma')
                                            ->placeholder('Selecione a turma')
                                            ->options(Classroom::query()->pluck('name', 'id')->all())
                                            ->searchable()
                                            ->nullable()
                                            ->visible(fn($get): bool => $get('role') === UserRole::Student->value),

                                        TextInput::make('student_guardian')
                                            ->label('Responsável')
                                            ->placeholder('Nome do responsável')
                                            ->maxLength(255)
                                            ->visible(fn($get): bool => $get('role') === UserRole::Student->value),

                                        TextInput::make('student_guardian_contact')
                                            ->label('Contato do responsável')
                                            ->placeholder('Telefone ou e-mail do responsável')
                                            ->required(fn($get): bool => $get('role') === UserRole::Student->value)
                                            ->maxLength(255)
                                            ->visible(fn($get): bool => $get('role') === UserRole::Student->value),

                                        TextInput::make('teacher_specialization')
                                            ->label('Especialização')
                                            ->placeholder('Informe a especialização')
                                            ->maxLength(255)
                                            ->visible(fn($get): bool => $get('role') === UserRole::Teacher->value),

                                        TextInput::make('teacher_specialization_college')
                                            ->label('Instituição da especialização')
                                            ->placeholder('Nome da instituição')
                                            ->maxLength(255)
                                            ->visible(fn($get): bool => $get('role') === UserRole::Teacher->value),

                                        TextInput::make('teacher_workload')
                                            ->label('Carga horária (horas)')
                                            ->placeholder('Ex.: 40')
                                            ->numeric()
                                            ->required(fn($get): bool => $get('role') === UserRole::Teacher->value)
                                            ->minValue(1)
                                            ->visible(fn($get): bool => $get('role') === UserRole::Teacher->value),

                                        TextInput::make('teacher_salary')
                                            ->label('Salário')
                                            ->placeholder('Ex.: 3500.00')
                                            ->numeric()
                                            ->required(fn($get): bool => $get('role') === UserRole::Teacher->value)
                                            ->minValue(0)
                                            ->visible(fn($get): bool => $get('role') === UserRole::Teacher->value),

                                        TextInput::make('admin_workload')
                                            ->label('Carga horária (horas)')
                                            ->placeholder('Ex.: 40')
                                            ->numeric()
                                            ->required(fn($get): bool => $get('role') === UserRole::Admin->value)
                                            ->minValue(1)
                                            ->visible(fn($get): bool => $get('role') === UserRole::Admin->value),

                                        TextInput::make('admin_salary')
                                            ->label('Salário')
                                            ->placeholder('Ex.: 5000.00')
                                            ->numeric()
                                            ->required(fn($get): bool => $get('role') === UserRole::Admin->value)
                                            ->minValue(0)
                                            ->visible(fn($get): bool => $get('role') === UserRole::Admin->value),

                                        Select::make('admin_position')
                                            ->label('Cargo')
                                            ->placeholder('Selecione o cargo')
                                            ->options([
                                                'coordinator' => 'Coordenador(a)',
                                                'principal' => 'Diretor(a)',
                                            ])
                                            ->required(fn($get): bool => $get('role') === UserRole::Admin->value)
                                            ->visible(fn($get): bool => $get('role') === UserRole::Admin->value),
                                    ])
                                    ->columns([
                                        'default' => 1,
                                        'md' => 2,
                                    ]),
                            ]),
                    ])
                    ->contained(false)
                    ->persistTab()
                    ->id('user-registration-tabs')
                    ->columnSpanFull(),
            ]);
    }
}
