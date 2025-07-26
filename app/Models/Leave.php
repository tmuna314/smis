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
        'from_date',
        'to_date',
        'status'
    ];

    // ✅ This will make from_date & to_date act like Carbon objects
    protected $casts = [
        'from_date' => 'date',
        'to_date' => 'date',
    ];

    // Optional: define relationship with Student (if model exists)
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
