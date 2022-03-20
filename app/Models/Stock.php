<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    // 保存した投稿を表示するためのリレーション
    public function blogs(){
        return $this->belongsTo('App\Models\Blog');
    }
}
