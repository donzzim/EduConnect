<?php

namespace App\Filament\Resources\Admins\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\Admins\AdminResource;
use App\Models\Admin;
use App\Models\User;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CreateAdmin extends CreateRecord
{
    protected static string $resource = AdminResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return DB::transaction(function () use ($data): Admin {
            $user = User::create([
                'name' => $data['user_name'],
                'birth_date' => $data['user_birth_date'],
                'enrollment' => $data['user_enrollment'],
                'registration_number' => $data['user_registration_number'],
                'gender' => $data['user_gender'],
                'email' => $data['user_email'] ?? null,
                'institutional_email' => $data['user_institutional_email'] ?? null,
                'address' => $data['user_address'] ?? null,
                'password' => $data['user_password'],
                'role' => UserRole::Admin->value,
            ]);

            return Admin::create([
                'user_id' => $user->id,
                'workload' => $data['workload'],
                'salary' => $data['salary'],
                'position' => $data['position'],
            ]);
        });
    }
}
