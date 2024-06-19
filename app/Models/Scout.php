<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scout extends Model
{
    use HasFactory;

    // テーブル名を指定する場合（省略可能）
    protected $table = 'scouts';

    // ここにモデルのプロパティやリレーションを定義する
    protected $fillable = [
        'user_id',
        'company_id',
        'condition',
    ];

    // リレーションの例
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}