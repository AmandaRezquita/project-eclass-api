<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Laravel\Sanctum\HasApiTokens; 

class Siswa extends Authenticatable
{
    use HasFactory, HasApiTokens; 

    protected $fillable = [
        'student_id',
        'name',
        'phone_number',
        'email',
        'password',
        'confirm_pass',
        'image',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
