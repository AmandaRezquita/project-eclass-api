<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GuruResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {
        return[
            'teacher_id' => $this->teacher_id,
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
