<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class KelasResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'class_id' => $this->class_id,
            'class_name' => $this->class_name,
            'class_desc' => $this->class_desc,
            'class_code' => $this->class_code,
        ];
    }
}
