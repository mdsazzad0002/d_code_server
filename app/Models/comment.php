<?php

namespace App\Models;

use App\Models\post;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function vote(){
        // if(auth()?->user()){
            return $this->hasOne(Vote::class, 'comment_id', 'id')->where('user_id', auth()?->user()?->id);
        // }
    }

    public function post(){
        return $this->hasOne(post::class, 'id', 'post_id')->where('status', 1);
    }
}
