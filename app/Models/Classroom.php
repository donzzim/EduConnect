<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'classrooms';
    protected $guarded = [
        'id'
    ];

    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'classroom_subjects')
            ->withPivot('subject_id');
    }

    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class, 'classroom_subjects')
            ->withPivot('teacher_id');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    // Para saber quais matérias e professores esta turma tem
    // public function gradeCurricular(): HasMany {
    //     return $this->hasMany(TurmaDisciplina::class);
    // }
}
