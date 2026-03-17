<?php

namespace App\Services;

use App\Enums\UserRole;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreatesUserLinkedRecords
{
    public function create(array $data, UserRole $role): Model
    {
        return DB::transaction(function () use ($data, $role): Model {
            $user = User::create($this->extractUserData($data, $role));

            return match ($role) {
                UserRole::Student => Student::create([
                    'user_id' => $user->id,
                    'classroom_id' => $data['classroom_id'] ?? null,
                    'status' => $data['status'] ?? 'enrolled',
                    'guardian' => $data['guardian'] ?? null,
                    'guardian_contact' => $data['guardian_contact'],
                ]),
                UserRole::Teacher => Teacher::create([
                    'user_id' => $user->id,
                    'specialization' => $data['specialization'] ?? null,
                    'specialization_college' => $data['specialization_college'] ?? null,
                    'workload' => $data['workload'],
                    'salary' => $data['salary'],
                ]),
                UserRole::Admin => Admin::create([
                    'user_id' => $user->id,
                    'workload' => $data['workload'],
                    'salary' => $data['salary'],
                    'position' => $data['position'],
                ]),
            };
        });
    }

    private function extractUserData(array $data, UserRole $role): array
    {
        return [
            'name' => $data['user_name'],
            'birth_date' => $data['user_birth_date'],
            'enrollment' => $data['user_enrollment'],
            'registration_number' => $data['user_registration_number'],
            'gender' => $data['user_gender'],
            'email' => $data['user_email'] ?? null,
            'institutional_email' => $data['user_institutional_email'] ?? null,
            'address' => $data['user_address'] ?? null,
            'password' => $data['user_password'],
            'role' => $role->value,
        ];
    }
}
