<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('E-mail')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable(),
                TextColumn::make('registration_number')
                    ->label('Documento (RG/CPF)')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                TextColumn::make('gender')
                    ->label('Sexo')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        "male" => 'Masculino',
                        "female" => 'Feminino',
                        "other" => 'Outro',
                    })
                    ->searchable(),
                TextColumn::make('enrollment')
                    ->label('Matrícula')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('role')
                    ->label('Perfil')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'student' => 'Aluno',
                        'teacher' => 'Professor',
                        'admin' => 'Admin',
                        default => $state,
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'student' => 'info',
                        'teacher' => 'warning',
                        'admin' => 'danger',
                        default => 'gray',
                    }),
                TextColumn::make('institutional_email')
                    ->label('E-mail institucional')
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('birth_date')
                    ->label('Nascimento')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->date('d/m/Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->label('Perfil')
                    ->options([
                        'student' => 'Aluno',
                        'teacher' => 'Professor',
                        'admin' => 'Admin',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
