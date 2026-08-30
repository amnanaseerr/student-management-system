<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Day 11: Eloquent Relationships
    protected $fillable = [
        'course_name',
        'course_code',
        'credit_hours',
    ];

    // A Course has many Students (one-to-many)
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
