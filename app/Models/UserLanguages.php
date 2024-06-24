<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; 
use Carbon\Carbon;
use App\Models\ProgrammingLanguage; // エラー出たので完全な名前空間を指定しました。

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function programmingLanguage()
    {
        return $this->belongsTo(ProgrammingLanguage::class);
    }

    public function programmingLanguage()
    {
        return $this->belongsTo(programming_languages::class, 'programming_language_id');
        
    }


    

}
