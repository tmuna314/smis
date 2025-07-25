<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'registration_number', 'name', 'email', 'college_email', 'mobile', 'landline',
        'blood_group', 'date_of_birth', 'batch_id'];
}

