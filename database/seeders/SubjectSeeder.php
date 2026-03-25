<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            ['name' => 'Língua Portuguesa', 'workload' => 120, 'description' => 'Leitura, produção textual e interpretação de gêneros diversos.'],
            ['name' => 'Matemática', 'workload' => 120, 'description' => 'Raciocínio lógico, álgebra, geometria e resolução de problemas.'],
            ['name' => 'História', 'workload' => 80, 'description' => 'Estudo de processos históricos do Brasil e do mundo contemporâneo.'],
            ['name' => 'Geografia', 'workload' => 80, 'description' => 'Território, população, meio ambiente e dinâmica socioespacial.'],
            ['name' => 'Ciências', 'workload' => 80, 'description' => 'Fundamentos de biologia, física e química para o ensino básico.'],
            ['name' => 'Biologia', 'workload' => 80, 'description' => 'Ecologia, genética, citologia e fisiologia humana.'],
            ['name' => 'Física', 'workload' => 80, 'description' => 'Mecânica, energia, eletricidade e fenômenos físicos aplicados.'],
            ['name' => 'Química', 'workload' => 80, 'description' => 'Transformações da matéria, ligações químicas e soluções.'],
            ['name' => 'Filosofia', 'workload' => 40, 'description' => 'Pensamento crítico, ética e principais correntes filosóficas.'],
            ['name' => 'Sociologia', 'workload' => 40, 'description' => 'Cultura, cidadania, trabalho e organização social.'],
            ['name' => 'Língua Inglesa', 'workload' => 60, 'description' => 'Leitura e comunicação básica em língua inglesa.'],
            ['name' => 'Redação', 'workload' => 60, 'description' => 'Produção de textos dissertativos e repertório argumentativo.'],
            ['name' => 'Arte', 'workload' => 40, 'description' => 'Expressões artísticas, história da arte e produção criativa.'],
            ['name' => 'Educação Física', 'workload' => 40, 'description' => 'Práticas corporais, saúde e desenvolvimento motor.'],
        ];

        foreach ($subjects as $subject) {
            Subject::updateOrCreate(
                ['name' => $subject['name']],
                [
                    'slug' => Str::slug($subject['name']),
                    'description' => $subject['description'],
                    'workload' => $subject['workload'],
                ],
            );
        }
    }
}
