<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //リレーション
    public function reviews() {
        return $this->hasMany(\App\Review::class, 'post_id', 'id');
    }
}
