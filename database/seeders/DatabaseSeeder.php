<?php

namespace Database\Seeders;

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
        User::factory()->create([
            'name' => 'Lucas',
            'birth_date' => '2003-09-04',
            'enrollment' => '202299644',
            'registration_number' => '17804597770',
            'address' => '{"cep":"29101-780","logradouro":"Rua Goiânia","complemento":"até 1000 - lado par","unidade":"","bairro":"Itapuã","localidade":"Vila Velha","uf":"ES","estado":"Espírito Santo","regiao":"Sudeste","ibge":"3205200","gia":"","ddd":"27","siafi":"5703"}',
            'gender' => 'male',
            'position' => 'admin',
            'email' => 'lucas@dev.com',
            'password' => bcrypt('1234'),
        ]);
        User::factory(9)->create();
    }
}
