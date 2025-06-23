<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
        'created_by',
        'faculty_id',
    ];

    // Optional: Relationship to Faculty
    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}
