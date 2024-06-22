<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    public function comment(){
        return $this->hasOne(comment::class, 'id', 'comment_id');
    }

    public function post(){
        return $this->hasOne(post::class, 'id', 'post_id');
    }
}
