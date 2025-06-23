<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationalInfo extends Model
{
       protected $fillable = [
        'student_id',
        'symbol_no',
        'board',
        'passed_year',
        'marks_obtained'
    ];
}
