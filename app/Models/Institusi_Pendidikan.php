<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens; 

class Institusi_Pendidikan extends Model
{
    use HasFactory, HasApiTokens;
    protected $fillable =[
        'institution_id',
        'institution_name',
        'phone_number',
        'institution_email',
        'password',
        'confirm_pass',
        'institution_image',
        'role_id',
    ];
    public $timestamps = false;

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
