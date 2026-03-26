<?php

namespace App\Filament\Resources\Subjects\Tables;

use App\Models\Subject;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SubjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->with(['teachers.user', 'classrooms']))
            ->columns([
                TextColumn::make('name')
                    ->label('Disciplina')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('workload')
                    ->label('Carga horária')
                    ->suffix('h')
                    ->alignCenter()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Descrição')
                    ->limit(60)
                    ->wrap(),
                TextColumn::make('teachers_total')
                    ->label('Professores')
                    ->state(fn (Subject $record): int => $record->teachers->unique('id')->count())
                    ->badge()
                    ->color('success')
                    ->alignCenter(),
                Panel::make([
                    TextColumn::make('teachers.user.name')
                        ->label('Professores responsáveis')
                        ->badge()
                        ->listWithLineBreaks()
                        ->distinctList()
                        ->placeholder('Nenhum professor vinculado a esta disciplina.'),
                    TextColumn::make('classrooms.name')
                        ->label('Turmas vinculadas')
                        ->badge()
                        ->listWithLineBreaks()
                        ->distinctList()
                        ->placeholder('Nenhuma turma vinculada a esta disciplina.'),
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
