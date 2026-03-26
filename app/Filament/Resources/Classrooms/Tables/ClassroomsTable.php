<?php

namespace App\Filament\Resources\Classrooms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ClassroomsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->with(['students.user']))
            ->columns([
                TextColumn::make('name')
                    ->label('Nome da Turma')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->searchable()
                    ->sortable(),
                TextColumn::make('shift')
                    ->label('Turno')
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'morning' => 'Manhã',
                        'afternoon' => 'Tarde',
                        'night' => 'Noite',
                        default => $state,
                    })
                    ->alignCenter()
                    ->badge()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('school_year')
                    ->label('Ano letivo')
                    ->alignCenter()
                    ->sortable(),
                Panel::make([
                    TextColumn::make('students.user.name')
                        ->label('Alunos da turma')
                        ->listWithLineBreaks()
                        ->distinctList()
                        ->placeholder('Nenhum aluno vinculado a esta turma.'),
                    TextColumn::make('students.user.enrollment')
                        ->label('Número de Matrícula')
                        ->listWithLineBreaks()
                        ->distinctList()
                ])
                    ->collapsible(),
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
