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
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),

                TextColumn::make('enrollment')
                    ->label('Matrícula')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('role')
                    ->label('Perfil')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'student' => 'Aluno',
                        'teacher' => 'Professor',
                        'admin' => 'Admin',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'student' => 'info',
                        'teacher' => 'warning',
                        'admin' => 'danger',
                        default => 'gray',
                    }),

                TextColumn::make('institutional_email')
                    ->label('E-mail institucional')
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('birth_date')
                    ->label('Nascimento')
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
