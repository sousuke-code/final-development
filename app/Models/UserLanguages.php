<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use Carbon\Carbon;

class UserLanguages extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'programming_language_id',
        'content',
        'time',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'start_time'=> 'datetime',
        'end_time'=>'datetime',
    ];

}
