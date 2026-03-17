<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class ViaCepService
{
    public function search(string $cep): array
    {
        $normalizedCep = preg_replace('/\D+/', '', $cep);

        if (! is_string($normalizedCep) || strlen($normalizedCep) !== 8) {
            throw new RuntimeException('CEP inválido. Informe 8 dígitos.');
        }

        $response = Http::timeout(8)->get("https://viacep.com.br/ws/{$normalizedCep}/json/");

        if (! $response->successful()) {
            throw new RuntimeException('Não foi possível consultar o CEP no momento.');
        }

        $payload = $response->json();

        if (! is_array($payload) || ($payload['erro'] ?? false)) {
            throw new RuntimeException('CEP não encontrado.');
        }

        return [
            'cep' => $payload['cep'] ?? $normalizedCep,
            'logradouro' => $payload['logradouro'] ?? null,
            'bairro' => $payload['bairro'] ?? null,
            'cidade' => $payload['localidade'] ?? null,
            'uf' => $payload['uf'] ?? null,
            'complemento' => $payload['complemento'] ?? null,
        ];
    }
}
