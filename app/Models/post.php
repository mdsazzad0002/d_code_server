<?php

namespace App\Models;
// use Laravel\Scout\Searchable;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    // use Searchable;

     /**
     * Get the name of the index associated with the model.
     */
    // public function searchableAs(): string
    // {
    //     return 'posts';
    // }
    public function users(){
        return $this->hasOne(User::class,'id' ,'user_id' );
    }
}
