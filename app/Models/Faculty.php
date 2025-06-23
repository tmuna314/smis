<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $fillable = [
        'name', 
        'shortcode', 
        'affiliated_to',
         'created_by'
        ];
}
