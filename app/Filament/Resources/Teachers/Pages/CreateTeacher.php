<?php

namespace App\Filament\Resources\Teachers\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\Teachers\TeacherResource;
use App\Models\Teacher;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data): Teacher {
            $user = User::factory()->create([
                'name' => $data['user_name'],
                'birth_date' => $data['user_birth_date'],
                'enrollment' => $data['user_enrollment'],
                'registration_number' => $data['user_registration_number'],
                'gender' => $data['user_gender'],
                'email' => $data['user_email'] ?? null,
                'institutional_email' => $data['user_institutional_email'] ?? null,
                'address' => $data['user_address'] ?? null,
                'password' => $data['user_password'],
                'role' => UserRole::Teacher->value,
            ]);

            return Teacher::factory()->create([
                'user_id' => $user->id,
                'specialization' => $data['specialization'] ?? null,
                'specialization_college' => $data['specialization_college'] ?? null,
                'workload' => $data['workload'],
                'salary' => $data['salary'],
            ]);
        });
    }
}
