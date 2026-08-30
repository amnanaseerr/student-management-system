<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'roll_no' => $this->roll_no,
            'department' => $this->department,
            'semester' => $this->semester,
            'course' => $this->whenLoaded('course', fn () => [
                'id' => $this->course->id,
                'course_name' => $this->course->course_name,
            ]),
            'course_id' => $this->course_id,
            'photo_url' => $this->photo ? asset('storage/' . $this->photo) : null,
            'created_at' => $this->created_at,
        ];
    }
}
