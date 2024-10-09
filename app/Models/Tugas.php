<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $fillable =[
        'task_id',
        'title',
        'description',
        'attachment',
        'deadline',
        'score',
        'class_id',
    ];
    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'class_id');
    }
}
