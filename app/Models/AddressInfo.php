<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'province_name',
        'district_name',
        'ward_vdc',
        'tole_street',
        'is_permanent',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
    
