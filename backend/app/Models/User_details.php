<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_details extends Model
{
    /** @use HasFactory<\Database\Factories\UserDetailsFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $table = 'user_details';
    protected $fillable = [
        'user_id',
        'id_number',
        'id_issued_date',
        'id_issued_place',
        'marital_status',
        'nationality',
        'instagram_url',
        'linkedin_url',
        'tiktok_url',
        'company_name',
        'company_address',
        'working_status',
        'shipping_note',
        'preferred_payment',
        'points',
        'slug',
        'status',
        'last_login_at',
        'device_info',
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
