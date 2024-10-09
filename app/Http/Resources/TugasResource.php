<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TugasResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'task_id' => $this->class_id,
            'title' => $this->title,
            'description' => $this->description,
            'attachment' => $this->attachment,
            'deadline' => $this->deadline,
            'score' => $this->score,
            'class_id' => $this->class_id,
        ]; 
    }
}
