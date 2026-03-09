<?php

namespace App\Filament\Resources\Admins\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AdminsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')->label('Nome')->searchable(),
                TextColumn::make('user.email')->label('E-mail')->searchable(),
                TextColumn::make('position')
                    ->label('Cargo')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'coordinator' => 'Coordenador(a)',
                        'principal' => 'Diretor(a)',
                        default => $state,
                    }),
                TextColumn::make('workload')->label('Carga horária'),
                TextColumn::make('salary')->label('Salário')->money('BRL'),
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
