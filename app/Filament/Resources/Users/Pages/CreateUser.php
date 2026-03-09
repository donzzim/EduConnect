<?php

namespace App\Filament\Resources\Users\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\Users\UserResource;
use App\Models\Admin;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data): User {
            $user = User::create([
                'name' => $data['name'],
                'birth_date' => $data['birth_date'],
                'enrollment' => $data['enrollment'],
                'registration_number' => $data['registration_number'],
                'gender' => $data['gender'],
                'role' => $data['role'],
                'email' => $data['email'] ?? null,
                'institutional_email' => $data['institutional_email'] ?? null,
                'address' => $data['address'] ?? null,
                'password' => $data['password'],
            ]);

            $this->syncProfile($user, $data);

            return $user;
        });
    }

    private function syncProfile(User $user, array $data): void
    {
        match ($user->role) {
            UserRole::Student->value => Student::create([
                'user_id' => $user->id,
                'classroom_id' => $data['student_classroom_id'] ?? null,
                'status' => $data['student_status'],
                'guardian' => $data['student_guardian'] ?? null,
                'guardian_contact' => $data['student_guardian_contact'],
            ]),
            UserRole::Teacher->value => Teacher::create([
                'user_id' => $user->id,
                'specialization' => $data['teacher_specialization'] ?? null,
                'specialization_college' => $data['teacher_specialization_college'] ?? null,
                'workload' => $data['teacher_workload'],
                'salary' => $data['teacher_salary'],
            ]),
            UserRole::Admin->value => Admin::create([
                'user_id' => $user->id,
                'workload' => $data['admin_workload'],
                'salary' => $data['admin_salary'],
                'position' => $data['admin_position'],
            ]),
            default => null,
        };
    }
}
