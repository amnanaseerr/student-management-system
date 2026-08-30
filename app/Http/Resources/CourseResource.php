<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // parent::toArray() includes every attribute on the model, so any
        // extra Course columns you have (course_code, credit_hours, etc.)
        // still show up automatically.
        return array_merge(parent::toArray($request), [
            'id' => $this->id,
            'course_name' => $this->course_name,
        ]);
    }
}
