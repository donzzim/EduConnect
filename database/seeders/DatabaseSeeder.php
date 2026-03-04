<?php

namespace Database\Seeders;

use App\Enums\UserRole;
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
        $adminUser = User::create([
            'name' => 'Lucas César Soares Santos',
            'birth_date' => '2003-09-04',
            'enrollment' => '202299644',
            'registration_number' => '17804597770',
            'address' => '{"cep":"29101-780","logradouro":"Rua Goiânia","complemento":"até 1000 - lado par","unidade":"","bairro":"Itapuã","localidade":"Vila Velha","uf":"ES","estado":"Espírito Santo","regiao":"Sudeste","ibge":"3205200","gia":"","ddd":"27","siafi":"5703"}',
            'gender' => 'male',
            'role' => UserRole::Admin,
            'email' => 'lucas@dev.com',
            'institutional_email' => 'lucas.santos@educonnect.com',
            'password' => Hash::make('1234'),
        ]);

        Admin::create([
            'user_id' => $adminUser->id,
            'workload' => 40,
            'salary' => 5000.00,
            'position' => 'principal'
        ]);

        $studentUser = User::create([
            'name' => 'Renato César dos Santos',
            'birth_date' => '1958-12-10',
            'enrollment' => '202245679',
            'registration_number' => '55793282776',
            'address' => '{"cep": "29101-680", "logradouro": "Rua Porto Alegre", "complemento": "até 900 - lado par", "unidade": "", "bairro": "Itapuã", "localidade": "Vila Velha", "uf": "ES", "estado": "Espírito Santo", "regiao": "Sudeste", "ibge": "3205200", "gia": "", "ddd": "27", "siafi": "5703"}',
            'gender' => 'male',
            'role' => UserRole::Student,
            'email' => 'renatovisk@gmail.com',
            'institutional_email' => 'renato.santos@educonnect.com',
            'password' => Hash::make('1234'),
        ]);

        Student::create([
            'user_id' => $studentUser->id,
            'classroom_id' => null,
            'status' => 'enrolled',
            'guardian' => 'Maria dos Santos',
            'guardian_contact' => '27999999999'
        ]);

        $teacherUser = User::create([
            'name' => 'Rosana Ferreira Soares Santos',
            'birth_date' => '1970-12-22',
            'enrollment' => '202255773',
            'registration_number' => '3850328',
            'address' => '{"cep": "29101-680", "logradouro": "Rua Porto Alegre", "complemento": "até 900 - lado par", "unidade": "", "bairro": "Itapuã", "localidade": "Vila Velha", "uf": "ES", "estado": "Espírito Santo", "regiao": "Sudeste", "ibge": "3205200", "gia": "", "ddd": "27", "siafi": "5703"}',
            'gender' => 'female',
            'role' => UserRole::Teacher,
            'email' => 'rosanalucas@gmail.com',
            'institutional_email' => 'rosana.santos@educonnect.com',
            'password' => Hash::make('1234'),
        ]);

        Teacher::create([
            'user_id' => $teacherUser->id,
            'specialization' => 'Matemática',
            'specialization_college' => 'Universidade Federal do Espírito Santo - UFES',
            'workload' => 20,
            'salary' => 3000.00
        ]);
    }
}
