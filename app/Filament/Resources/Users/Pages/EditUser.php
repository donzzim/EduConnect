<?php

namespace App\Filament\Resources\Users\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\Users\UserResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\DB;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $student = $this->record->student;
        $teacher = $this->record->teacher;
        $admin = $this->record->admin;

        $data['student_status'] = $student?->status;
        $data['student_classroom_id'] = $student?->classroom_id;
        $data['student_guardian'] = $student?->guardian;
        $data['student_guardian_contact'] = $student?->guardian_contact;

        $data['teacher_specialization'] = $teacher?->specialization;
        $data['teacher_specialization_college'] = $teacher?->specialization_college;
        $data['teacher_workload'] = $teacher?->workload;
        $data['teacher_salary'] = $teacher?->salary;

        $data['admin_workload'] = $admin?->workload;
        $data['admin_salary'] = $admin?->salary;
        $data['admin_position'] = $admin?->position;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        DB::transaction(function () use ($data): void {
            $role = $data['role'];

            $userData = [
                'name' => $data['name'],
                'birth_date' => $data['birth_date'],
                'enrollment' => $data['enrollment'],
                'registration_number' => $data['registration_number'],
                'gender' => $data['gender'],
                'email' => $data['email'] ?? null,
                'institutional_email' => $data['institutional_email'] ?? null,
                'address' => $data['address'] ?? null,
                'role' => $role,
            ];

            if (filled($data['password'] ?? null)) {
                $userData['password'] = $data['password'];
            }

            $this->record->update($userData);

            if ($role !== UserRole::Student->value) {
                $this->record->student?->delete();
            }

            if ($role !== UserRole::Teacher->value) {
                $this->record->teacher?->delete();
            }

            if ($role !== UserRole::Admin->value) {
                $this->record->admin?->delete();
            }

            match ($role) {
                UserRole::Student->value => $this->record->student()->updateOrCreate(
                    ['user_id' => $this->record->id],
                    [
                        'classroom_id' => $data['student_classroom_id'] ?? null,
                        'status' => $data['student_status'],
                        'guardian' => $data['student_guardian'] ?? null,
                        'guardian_contact' => $data['student_guardian_contact'],
                    ],
                ),
                UserRole::Teacher->value => $this->record->teacher()->updateOrCreate(
                    ['user_id' => $this->record->id],
                    [
                        'specialization' => $data['teacher_specialization'] ?? null,
                        'specialization_college' => $data['teacher_specialization_college'] ?? null,
                        'workload' => $data['teacher_workload'],
                        'salary' => $data['teacher_salary'],
                    ],
                ),
                UserRole::Admin->value => $this->record->admin()->updateOrCreate(
                    ['user_id' => $this->record->id],
                    [
                        'workload' => $data['admin_workload'],
                        'salary' => $data['admin_salary'],
                        'position' => $data['admin_position'],
                    ],
                ),
                default => null,
            };
        });

        unset(
            $data['student_status'],
            $data['student_classroom_id'],
            $data['student_guardian'],
            $data['student_guardian_contact'],
            $data['teacher_specialization'],
            $data['teacher_specialization_college'],
            $data['teacher_workload'],
            $data['teacher_salary'],
            $data['admin_workload'],
            $data['admin_salary'],
            $data['admin_position'],
            $data['password_confirmation'],
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
