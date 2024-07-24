<?php

namespace App\Models;

use App\Models\post;
use App\Models\comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['updated_at'];

    public function comment(){
        return $this->hasOne(comment::class, 'id', 'comment_id');
    }

    public function post(){
        return $this->hasOne(post::class, 'id', 'post_id');
    }
}
