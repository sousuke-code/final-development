<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolios extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'email',
        'bio',
        'languages',
        'learning_languages',
        'career',
    ];
}
