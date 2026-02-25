<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $guarded = [
        'id'
    ];
    public function notas(): HasMany
    {
        return $this->hasMany(Grade::class);
    }
    public function professores(): BelongsToMany
    {
        return $this->belongsToMany(Teacher::class, 'classroom_subjects');
    }
}
