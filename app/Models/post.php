<?php

namespace App\Models;
// use Laravel\Scout\Searchable;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class post extends Model
{
    use HasFactory;

    public function users(){
        return $this->hasOne(User::class,'id' ,'user_id' );
    }

    public function category(){
        return $this->hasOne(subcategory::class, 'id', 'subcategory_id');
    }
}
