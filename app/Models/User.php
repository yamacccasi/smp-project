<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Retailer;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['name',
        'username',
        'password',
        'email',
        'role',
        'location'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function retailers() {
        return $this->belongsToMany(Retailer::class, 'user_retailer')
            ->withPivot('is_active')
            ->withTimestamps();
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts()
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isSuperuser() {
        return $this->role === 'superuser';
    }

    public function isRegularUser() {
        return $this->role === 'regular_user';
    }
}
