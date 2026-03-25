<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $schoolYear = (int) now()->format('Y');

        $classrooms = [
            ['name' => '1º Ano A', 'shift' => 'morning'],
            ['name' => '1º Ano B', 'shift' => 'morning'],
            ['name' => '1º Ano C', 'shift' => 'afternoon'],
            ['name' => '2º Ano A', 'shift' => 'morning'],
            ['name' => '2º Ano B', 'shift' => 'afternoon'],
            ['name' => '2º Ano C', 'shift' => 'night'],
            ['name' => '3º Ano A', 'shift' => 'morning'],
            ['name' => '3º Ano B', 'shift' => 'afternoon'],
            ['name' => '3º Ano C', 'shift' => 'night'],
        ];

        foreach ($classrooms as $classroom) {
            Classroom::updateOrCreate(
                [
                    'name' => $classroom['name'],
                    'school_year' => $schoolYear,
                ],
                ['shift' => $classroom['shift']],
            );
        }
    }
}
