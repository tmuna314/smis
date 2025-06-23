<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuardianInfo extends Model
{
    protected $fillable = [
        'student_id',
        'name',
        'mobile',
        'email',
        'contact_no',
        'contact_address',
        'relation',
    ];
}
