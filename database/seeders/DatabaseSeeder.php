<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $adminUser = User::updateOrCreate(
            ['email' => 'lucas@dev.com'],
            [
                'name' => 'Lucas César Soares Santos',
                'birth_date' => '2003-09-04',
                'enrollment' => '202299644',
                'registration_number' => '17804597770',
                'address' => '{"cep":"29101-780","logradouro":"Rua Goiânia","complemento":"até 1000 - lado par","unidade":"","bairro":"Itapuã","localidade":"Vila Velha","uf":"ES","estado":"Espírito Santo","regiao":"Sudeste","ibge":"3205200","gia":"","ddd":"27","siafi":"5703"}',
                'gender' => 'male',
                'role' => UserRole::Admin->value,
                'institutional_email' => 'lucas.santos@educonnect.com',
                'password' => Hash::make('1234'),
            ],
        );

        Admin::updateOrCreate(
            ['user_id' => $adminUser->id],
            [
                'workload' => 40,
                'salary' => 5000.00,
                'position' => 'principal',
            ],
        );

        $this->seedReferenceUsers();

        $this->call([
            SubjectSeeder::class,
            ClassroomSeeder::class,
            GradeSeeder::class,
        ]);
    }

    private function seedReferenceUsers(): void
    {
        $studentUser = User::updateOrCreate(
            ['email' => 'renatovisk@gmail.com'],
            [
                'name' => 'Renato César dos Santos',
                'birth_date' => '1958-12-10',
                'enrollment' => '202245679',
                'registration_number' => '55793282776',
                'address' => '{"cep": "29101-680", "logradouro": "Rua Porto Alegre", "complemento": "até 900 - lado par", "unidade": "", "bairro": "Itapuã", "localidade": "Vila Velha", "uf": "ES", "estado": "Espírito Santo", "regiao": "Sudeste", "ibge": "3205200", "gia": "", "ddd": "27", "siafi": "5703"}',
                'gender' => 'male',
                'role' => UserRole::Student->value,
                'institutional_email' => 'renato.santos@educonnect.com',
                'password' => Hash::make('1234'),
            ],
        );

        Student::updateOrCreate(
            ['user_id' => $studentUser->id],
            [
                'classroom_id' => null,
                'status' => 'enrolled',
                'guardian' => 'Maria dos Santos',
                'guardian_contact' => '27999999999',
            ],
        );

        $teacherUser = User::updateOrCreate(
            ['email' => 'rosanalucas@gmail.com'],
            [
                'name' => 'Rosana Ferreira Soares Santos',
                'birth_date' => '1970-12-22',
                'enrollment' => '202255773',
                'registration_number' => '3850328',
                'address' => '{"cep": "29101-680", "logradouro": "Rua Porto Alegre", "complemento": "até 900 - lado par", "unidade": "", "bairro": "Itapuã", "localidade": "Vila Velha", "uf": "ES", "estado": "Espírito Santo", "regiao": "Sudeste", "ibge": "3205200", "gia": "", "ddd": "27", "siafi": "5703"}',
                'gender' => 'female',
                'role' => UserRole::Teacher->value,
                'institutional_email' => 'rosana.santos@educonnect.com',
                'password' => Hash::make('1234'),
            ],
        );

        Teacher::updateOrCreate(
            ['user_id' => $teacherUser->id],
            [
                'specialization' => 'Matemática',
                'specialization_college' => 'Universidade Federal do Espírito Santo - UFES',
                'workload' => 20,
                'salary' => 3000.00,
            ],
        );

        $secondStudentUser = User::updateOrCreate(
            ['email' => 'rcwernesbach@gmail.com'],
            [
                'name' => 'Rafael Christian Silva Wernesbach',
                'birth_date' => '2005-03-20',
                'enrollment' => '202308237',
                'registration_number' => '16073879725',
                'address' => '{"cep": "29101-025", "logradouro": "Rua Dom Jorge de Menezes", "complemento": "", "unidade": "", "bairro": "Praia da Costa", "localidade": "Vila Velha", "uf": "ES", "estado": "Espírito Santo", "regiao": "Sudeste", "ibge": "3205200", "gia": "", "ddd": "27", "siafi": "5703"}',
                'gender' => 'other',
                'role' => UserRole::Student->value,
                'institutional_email' => 'rafael.silva@educonnect.com',
                'password' => Hash::make('ra@202005'),
            ],
        );

        Student::updateOrCreate(
            ['user_id' => $secondStudentUser->id],
            [
                'classroom_id' => null,
                'status' => 'enrolled',
                'guardian' => 'Rafael Christian Silva Wernesbach',
                'guardian_contact' => '27996418383',
            ],
        );
    }
}
