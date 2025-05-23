<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users_profiles extends Model
{
    /** @use HasFactory<\Database\Factories\UsersProfilesFactory> */
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'users_profiles';
    protected $fillable = [
        'user_id',
        'avatar',
        'phone',
        'address',
        'city',
        'district',
        'ward',
        'country',
        'birthday',
        'gender',
        'facebook_url',
        'zalo',
        'bio',
        'job_title',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
