<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Nette\Utils\Random;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
//        $zipCodes = ['90210', '10001', '33101', '60601'];
//        $zipPicked = fake()->randomElement($zipCodes);
//
//        $response2 = Http::get("https://api.zippopotam.us/us/{$zipPicked}")->json();
//        $place = $response2['places'][0] ?? null;
//
//        $american_address = [
//            'zip_code' => $response2['post code'] ?? $zipPicked,
//            'street' => fake()->streetAddress(),
//            'city' => $place['place name'] ?? fake()->city(),
//            'state' => $place['state abbreviation'] ?? 'CA',
//            'country' => 'United States',
//        ];

        $ceps = [
            "29118010", "29118970", "29117120", "29117680", "29103000", "29103295",
            "29129899", "29114670", "29114790", "29120002", "29120790", "29119005",
            "29119460", "29128410", "29128553", "29125003", "29125180", "29124300",
            "29124425", "29107500", "29107570", "29102920", "29107375", "29109100",
            "29109190", "29121320", "29121370", "29100010", "29100971", "29114600",
            "29114620", "29124002", "29124900", "29117780", "29117800", "29117710",
            "29117770", "29111015", "29111690", "29105650", "29105840", "29102300",
            "29102915", "29106300", "29106595", "29103300", "29103347", "29107005",
            "29107900", "29129400", "29129463", "29121210", "29121230", "29121010",
            "29121110", "29122005", "29122970", "29103605", "29103790", "29108300",
            "29108973", "29115800", "29115836", "29115480", "29115725", "29106600",
            "29106775", "29104260", "29104359", "29118700", "29118755", "29129630",
            "29129697", "29101501", "29103959", "29126700", "29126763", "29100600",
            "29100680", "29104450", "29104570", "29104580", "29104758", "29113750",
            "29113768", "29102971", "29109095", "29103470", "29103525", "29112010",
            "29112330", "29127015", "29127074", "29103800", "29103900", "29126501",
            "29126608", "29129700", "29129750", "29128200", "29128290", "29127380",
            "29127595", "29110010", "29110902", "29111750", "29111875", "29104200",
            "29104238", "29129300", "29129345", "29104010", "29104180", "29100500",
            "29100590", "29115011", "29115970", "29116181", "29121295", "29118300",
            "29118390", "29104360", "29104900", "29129005", "29129215", "29103370",
            "29103414", "29100915", "29104959", "29102555", "29102599", "29102001",
            "29102973", "29125305", "29125370", "29119700", "29119750", "29102601",
            "29102857", "29112345", "29112780", "29126061", "29126130", "29116810",
            "29116840", "29113680", "29113740", "29108010", "29108930", "29105170",
            "29105340", "29105350", "29105973", "29126140", "29126180", "29126250",
            "29126900", "29118400", "29118670", "29109200", "29109650", "29124060",
            "29124127", "29114000", "29114973", "29106000", "29106295", "29127200",
            "29127375", "29124200", "29124295", "29113000", "29113920", "29116000",
            "29116170", "29116180", "29116690", "29103550", "29103582", "29105000",
            "29105169", "29124140", "29124177", "29107275", "29107298", "29129800",
            "29129810", "29118760", "29118822"
        ];
        $cepSorteado = fake()->randomElement($ceps);

        $response = Http::get("https://viacep.com.br/ws/{$cepSorteado}/json/")->json();

        $brazilian_address = [
            'cep' => $response['cep'] ?? $cepSorteado,
            'logradouro' => $response['logradouro'] ?? fake()->streetName(),
            'bairro' => $response['bairro'] ?? fake()->word(),
            'cidade' => $response['localidade'] ?? fake()->city(),
            'uf' => $response['uf'] ?? 'ES',
            'numero' => fake()->buildingNumber(),
            'complemento' => fake()->address(),
        ];


        return [
            'name' => fake()->name(),
            'birth_date' => fake()->date('Y-m-d', '-15 years'),
            'enrollment' => fake()->unique()->numerify('2026#####'),
            'registration_number' => fake()->unique()->numerify('###########'),
//            'address' => json_encode(fake()->randomElement([$american_address, $brazilian_address])),
            'address' => json_encode($brazilian_address),
            'gender' => fake()->randomElement(['male', 'female', 'other']),
            'position' => fake()->randomElement(['admin', 'teacher', 'student']),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
}
