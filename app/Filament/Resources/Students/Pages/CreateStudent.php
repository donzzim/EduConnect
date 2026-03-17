<?php

namespace App\Filament\Resources\Students\Pages;

use App\Enums\UserRole;
use App\Filament\Resources\Students\StudentResource;
use App\Services\CreatesUserLinkedRecords;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        return app(CreatesUserLinkedRecords::class)
            ->create($data, UserRole::Student);
    }
}
