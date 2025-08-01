<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = ['student_id', 'faculty_id',
    'semester_id','subject_id','teacher_id','batch_id', 'status','date','remarks'];

    // Define relationship: Attendance belongs to a Student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
