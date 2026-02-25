<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $table = 'students';
    protected $guarded = [
        'id'
    ];
    protected $hidden = [
        'password',
    ];
    protected $casts = [
        'password' => 'hashed',
        'address' => 'array',
    ];
    public function classroom(): BelongsTo
    {
        return $this->belongsTo(Classroom::class);
    }

    public function notas(): HasMany {
        return $this->hasMany(Grade::class);
    }
}
