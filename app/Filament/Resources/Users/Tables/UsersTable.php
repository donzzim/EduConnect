<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
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
                TextColumn::make('birth_date')
                    ->label('Data de Nascimento')
                    ->alignCenter()
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('enrollment')
                    ->label('Matrícula')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('registration_number')
                    ->label('Documento')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('gender_label')
                    ->label('Sexo')
                    ->alignCenter()
                    ->sortable()
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Masculino' => 'info',
                        'Feminino' => 'danger',
                        'Outro' => 'gray',
                        default => 'secondary',
                    }),
            ])
            ->filters([
                //
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
