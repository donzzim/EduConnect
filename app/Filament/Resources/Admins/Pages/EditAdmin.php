<?php

namespace App\Filament\Resources\Admins\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\Admins\AdminResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\DB;

class EditAdmin extends EditRecord
{
    protected static string $resource = AdminResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $user = $this->record->user;

        $data['user_name'] = $user?->name;
        $data['user_birth_date'] = $user?->birth_date?->format('Y-m-d');
        $data['user_enrollment'] = $user?->enrollment;
        $data['user_registration_number'] = $user?->registration_number;
        $data['user_gender'] = $user?->gender;
        $data['user_email'] = $user?->email;
        $data['user_institutional_email'] = $user?->institutional_email;
        $data['user_address'] = $user?->address;
        $data['user_role'] = UserRole::Admin->value;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        DB::transaction(function () use ($data): void {
            $userData = [
                'name' => $data['user_name'],
                'birth_date' => $data['user_birth_date'],
                'enrollment' => $data['user_enrollment'],
                'registration_number' => $data['user_registration_number'],
                'gender' => $data['user_gender'],
                'email' => $data['user_email'] ?? null,
                'institutional_email' => $data['user_institutional_email'] ?? null,
                'address' => $data['user_address'] ?? null,
                'role' => UserRole::Admin->value,
            ];

            if (filled($data['user_password'] ?? null)) {
                $userData['password'] = $data['user_password'];
            }

            $this->record->user?->update($userData);
        });

        unset(
            $data['user_name'],
            $data['user_birth_date'],
            $data['user_enrollment'],
            $data['user_registration_number'],
            $data['user_gender'],
            $data['user_email'],
            $data['user_institutional_email'],
            $data['user_address'],
            $data['user_role'],
            $data['user_password'],
            $data['user_password_confirmation'],
        );

        return $data;
    }

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
