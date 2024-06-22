<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function vote(){
        // if(auth()?->user()){
            return $this->hasOne(vote::class, 'comment_id', 'id')->where('user_id', auth()?->user()?->id);
        // }
    }

    public function post(){
        return $this->hasOne(Post::class, 'id', 'post_id');
    }
}
