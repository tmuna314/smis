<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'reason',
        'start_date',
        'end_date',
        'status'
    ];

    // ✅ This will make start_date', & end_date act like Carbon objects
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // Optional: define relationship with Student (if model exists)
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
