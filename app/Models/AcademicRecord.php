<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class AcademicRecord extends Model
{
    use HasUuids;

    protected $fillable = [
        'student_nim',
        'student_name',
        'course_id',
        'lecturer_id',
        'p1_cs',
        'p1_pe',
        'p2_cs',
        'p2_pe',
        'final_grade',
        'grade_letter',
        'grade_point',
        'integrity_hash',
    ];

    protected $casts = [
        'p1_cs' => 'decimal:2',
        'p1_pe' => 'decimal:2',
        'p2_cs' => 'decimal:2',
        'p2_pe' => 'decimal:2',
        'final_grade' => 'decimal:2',
        'grade_point' => 'decimal:2',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_nim', 'nim');
    }
}
