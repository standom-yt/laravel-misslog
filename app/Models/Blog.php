<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = array('id');

    // 投稿者を表示するためのリレーション
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function getUserName(){
        return $this->user->name;
    }

    public function nices() {
        return $this->hasMany('App\Models\Nice');
    }

    public function stocks() {
        return $this->hasMany('App\Models\Stock');
    }
}
