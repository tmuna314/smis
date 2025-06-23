<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title',
        'description',
        'isTuRelated',
        'isHoliday',
        'isForAll',
        'isFor',
        'created_by',
    ];

    public function creator() {
         return $this->belongsTo(User::class, 'created_by');
    }
}
