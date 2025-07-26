<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParentInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'father_name',
        'father_mobile',
        'father_email',
        'father_occupation',
        'mother_name',
        'mother_mobile',
        'mother_email',
        'mother_occupation',
    ];
}
