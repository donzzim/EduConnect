<?php

namespace App\Filament\Resources\Teachers\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\Teachers\TeacherResource;
use App\Services\CreatesUserLinkedRecords;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return app(CreatesUserLinkedRecords::class)
            ->create($data, UserRole::Teacher);
    }
}
