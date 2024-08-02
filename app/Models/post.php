<?php

namespace App\Models;
// use Laravel\Scout\Searchable;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class post extends Model
{
    use HasFactory, SoftDeletes;

    public function users(){
        return $this->hasOne(User::class,'id' ,'user_id' );
    }

    public function category(){
        return $this->hasOne(category::class, 'id', 'category_id');
    }
    public function subcategory(){
        return $this->hasOne(subcategory::class, 'id', 'subcategory_id');
    }
}
