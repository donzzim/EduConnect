<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Classroom extends Model
{
    protected $table = 'classrooms';
    protected $guarded = ['id'];
    public function professores(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'classroom_subjects')->withPivot('subject_id');
    }
    public function alunos(): HasMany {
        return $this->hasMany(Student::class);
    }

    // Para saber quais matérias e professores esta turma tem
    // public function gradeCurricular(): HasMany {
    //     return $this->hasMany(TurmaDisciplina::class);
    // }
}
