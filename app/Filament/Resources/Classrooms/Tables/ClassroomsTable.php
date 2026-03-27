<?php

namespace App\Filament\Resources\Classrooms\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\HtmlString;

class ClassroomsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(
                fn(Builder $query) => $query
                    ->with(['students.user'])
                    ->withCount('students')
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Nome da turma')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                TextColumn::make('shift')
                    ->label('Turno')
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'morning' => 'Manhã',
                        'afternoon' => 'Tarde',
                        'night' => 'Noite',
                        default => $state,
                    })
                    ->alignCenter()
                    ->badge()
                    ->sortable(),

                TextColumn::make('school_year')
                    ->label('Ano letivo')
                    ->alignCenter()
                    ->sortable(),

                TextColumn::make('students_count')
                    ->label('Qtd. alunos')
                    ->counts('students')
                    ->badge()
                    ->alignCenter(),

                Panel::make([
                    TextColumn::make('students_list')
                        ->label('Alunos da turma')
                        ->state(function ($record) {
                            if ($record->students->isEmpty()) {
                                return new HtmlString(
                                    '<p class="text-sm text-gray-500 dark:text-gray-400">
                                        Nenhum aluno vinculado a esta turma.
                                    </p>'
                                );
                            }

                            $items = $record->students
                                ->filter(fn($student) => $student->user)
                                ->map(function ($student) {
                                    $name = e($student->user->name ?? 'Sem nome');
                                    $enrollment = e($student->user->enrollment ?? 'Sem matrícula');

                                    return "
                                        <div class='rounded-lg border border-gray-200 dark:border-gray-700 p-3'>
                                            <p class='font-medium text-gray-950 dark:text-white'>{$name}</p>
                                            <p class='text-sm text-gray-500 dark:text-gray-400'>Matrícula: {$enrollment}</p>
                                        </div>
                                    ";
                                })
                                ->implode('');

                            return new HtmlString("
                                <div class='space-y-2'>
                                    {$items}
                                </div>
                            ");
                        })
                        ->html(),
                ])
                    ->collapsible(),
            ])
            ->defaultSort('name')
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label('')
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
