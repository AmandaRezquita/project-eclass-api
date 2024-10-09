<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SiswaResource extends JsonResource
{   
    public function toArray(Request $request)
    {
        return [
            'student_id' => $this->student_id,
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'password' => $this->password,
            'confirm_pass' => $this->confirm_pass,
            'image' => $this->image,
            'role_id' => $this->role_id,
        ];
    }
}
