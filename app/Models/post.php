<?php

namespace App\Models;
// use Laravel\Scout\Searchable;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
