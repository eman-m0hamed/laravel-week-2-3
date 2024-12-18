<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // protected $table = 'myusers';
    protected $fillable = [ // allowed columns
        'name',
        'email',
        'password',
        'image',
    ];

    // protected $guarded = []; // retricted columns

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
            'email_verified_at' => 'datetime', // 893332
            'password' => 'hashed',
        ];
    }

    function posts(){
        return $this->hasMany(Post::class, 'user_id');
    }
}


/**
 * hasOne() =>
 * hasMany()
 *belongsTo()
 *belongsToMany()
 */
