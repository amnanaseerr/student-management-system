<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'roll_no',
        'course_id',
        'department',
        'semester',
        'photo',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
