<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function userLanguages()
    {
        return $this->hasMany(UserLanguages::class);
    }
}


