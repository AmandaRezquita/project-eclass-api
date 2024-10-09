<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens; 

class Guru extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable =[
        'teacher_id',
        'name',
        'phone_number',
        'email',
        'password',
        'confirm_pass',
        'image',
        'role_id',
    ];
    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
