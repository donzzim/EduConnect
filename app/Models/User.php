<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use App\Enums\UserRole;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'institutional_email',
        'birth_date',
        'enrollment',
        'registration_number',
        'address',
        'role',
        'gender',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'address' => 'array',
            'birth_date' => 'date',
        ];
    }

    // /**
    //  * The model's default values for attributes.
    //  *
    //  * @var array
    //  */
    // protected $attributes = [
    //     'name' => 'John Doe'
    //     // Nome vem 'John Doe' como default
    // ];

    public function getGenderLabelAttribute(): string
    {
        return match ($this->gender) {
            'male' => 'Masculino',
            'female' => 'Feminino',
            'other' => 'Outro',
            default => 'Não informado',
        };
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isTeacher(): bool
    {
        return $this->role === 'teacher';
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return $panel->getId() === 'admin' && $this->isAdmin();
    }

    public function redirectTo()
    {
        return match ($this->role) {
            UserRole::Teacher->value => '/teacher/dashboard',
            UserRole::Student->value => '/student/dashboard',
            UserRole::Admin->value => '/admin',
            default => '/',
        };
    }
}
