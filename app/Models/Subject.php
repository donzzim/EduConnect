<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'subjects';
    protected $guarded = [
        'id'
    ];
    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'classroom_subjects');
    }

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'classroom_subjects')
            ->withPivot('teacher_id');
    }
}
