<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'class',
        'faculty_id',
        'batch_id',
        'semester_id',
        'subject_name',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}
