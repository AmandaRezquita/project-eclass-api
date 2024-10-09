<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Institusi_PResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'institution_id' => $this->institution_id,
            'institution_name' => $this->institution_name,
            'phone_number' => $this->phone_number,
            'institution_email' => $this->institution_email,
            'password' => $this->password,
            'confirm_pass' => $this->confirm_pass,
            'institution_image' => $this->institution_image,
            'role_id' => $this->role_id,
        ];
    }
}
