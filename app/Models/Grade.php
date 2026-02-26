<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Grade extends Model
{
    protected $table = 'notas';
    protected $guarded = ['id'];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function disciplina(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    protected static function booted()
    {
        static::saving(function ($grade) {
            $fields = ['T1', 'A1', 'T2', 'A2', 'T3', 'A3', 'T4', 'A4', 'T5', 'A5', 'T6', 'A6', 'FT', 'FA'];
            $sum = 0;
            foreach ($fields as $field) {
                $sum += $grade->$field ?? 0;
            }
            $grade->Total = $sum;
        });
    }
}
