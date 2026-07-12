<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
   use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'role',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [  // Change this from a function to a property
        'email_verified_at' => 'datetime',
        'password' => 'hashed',  // Laravel 10+ automatically hashes the password
    ];
}