<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programming_languages extends Model
{
    use HasFactory;
    public function userLanguages()
    {
        return $this->belongsTo(UserLanguages::class);
    }
}


