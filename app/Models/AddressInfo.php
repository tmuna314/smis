<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'province',
        'district',
        'ward_or_vdc',
        'tole_or_street',
        'is_permanent',
    ];

    protected $casts = [
        'is_permanent' => 'boolean',
    ];

    // Optional: If you have a Student model and want to link it
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
