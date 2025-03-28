<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
        'role',
        'password',
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
        ];
    }

    public function Name():Attribute{
        return Attribute::make(
            set:fn($value)=>strtolower($value),
            get:fn($value)=>ucwords($value)
        );
    }

    public function Email():Attribute{
        return Attribute::make(
            set:fn($value)=>strtolower($value)
        );
    }
    
    // public function Role():Attribute{
    //     return Attribute::make(
    //         get:fn($value)=>ucfirst($value)
    //     );
    // }

    public function CreatedAt():Attribute{
        return Attribute::make(
            get:fn($value)=>Carbon::parse($value)->format('d M Y')
        );
    }
}
