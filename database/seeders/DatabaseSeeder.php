<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminUser = User::factory()->create([
            'name' => 'Lucas',
            'birth_date' => '2003-09-04',
            'enrollment' => '202299644',
            'registration_number' => '17804597770',
            'address' => '{"cep":"29101-780","logradouro":"Rua Goiânia","complemento":"até 1000 - lado par","unidade":"","bairro":"Itapuã","localidade":"Vila Velha","uf":"ES","estado":"Espírito Santo","regiao":"Sudeste","ibge":"3205200","gia":"","ddd":"27","siafi":"5703"}',
            'gender' => 'male',
            'email' => 'lucas@dev.com',
            'password' => bcrypt('1234'),
        ]);

        Admin::factory()->create([
            'user_id' => $adminUser->id,
            'position' => 'principal'
        ]);

        $subjects = Subject::factory(10)->create();
        $classrooms = Classroom::factory(5)->create();
        $teachers = Teacher::factory(8)->create();

        $classrooms->each(function ($classroom) use ($subjects) {
            $students = Student::factory(30)->create([
                'classroom_id' => $classroom->id
            ]);

            $students->each(function ($student) use ($subjects) {
                foreach ($subjects->random(5) as $subject) {
                    Grade::factory()->create([
                        'student_id' => $student->id,
                        'subject_id' => $subject->id,
                    ]);
                }
            });
        });

        foreach ($classrooms as $classroom) {
            $randomSubjects = $subjects->random(3);
            foreach ($randomSubjects as $subject) {
                DB::table('classroom_subjects')->insert([
                    'classroom_id' => $classroom->id,
                    'subject_id' => $subject->id,
                    'teacher_id' => $teachers->random()->id
                ]);
            }
        }
    }
}
