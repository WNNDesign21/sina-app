<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasUuids;

    protected $fillable = [
        'course_id',
        'lecturer_id',
        'day',
        'start_time',
        'end_time',
        'room',
        'academic_year'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }
}
