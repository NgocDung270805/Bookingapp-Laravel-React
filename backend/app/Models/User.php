<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


/**
 * @method bool hasRole(string $role)
 */

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
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
    /**
     * The attributes that should be appended to the model's array form.
     *
     * @return list<string>
     */
    /**
     * Indicate that the model's email address should be verified.
     */
    public function profile()
    {
        return $this->hasOne(Users_profiles::class);
    }

    public function details()
    {
        return $this->hasOne(User_details::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'product_favorites', 'user_id', 'product_id')->withTimestamps();
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Mối quan hệ một-một với UsersProfile
    public function userProfile()
    {
        return $this->hasOne(Users_profiles::class);
    }

    // Mối quan hệ một-một với UserDetails
    public function userDetail()
    {
        return $this->hasOne(User_details::class);
    }
}