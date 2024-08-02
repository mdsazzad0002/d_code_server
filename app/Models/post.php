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

    protected $casts = [
        'created_at' => 'date:d-M-Y h:s A',
    ];
    protected $appends = ['status_name', 'category_name', 'subcategory_name'];
    public function users(){
        return $this->hasOne(User::class,'id' ,'user_id' );
    }

    public function category(){
        return $this->hasOne(category::class, 'id', 'category_id');
    }
    public function subcategory(){
        return $this->hasOne(subcategory::class, 'id', 'subcategory_id');
    }

    public function getStatusNameAttribute(){
        return $this->status == 1 ? 'Active' : "Inactive";
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name ?? '';
    }

    public function getSubcategoryNameAttribute(){
        return $this->subcategory->name ?? '';
    }

}
