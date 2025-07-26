<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherAssignment extends Model
{
    protected $fillable = [
        'faculty_id', 'batch_id', 'semester_id', 'subject_id', 'teacher_id', 'is_active'
    ];

    
    public function faculty() { return $this->belongsTo(Faculty::class); }
    public function batch() { return $this->belongsTo(Batch::class); }
    public function semester() { return $this->belongsTo(Semester::class); }
    public function subject() { return $this->belongsTo(Subject::class); }
    public function teacher() { return $this->belongsTo(Teacher::class); }
}
