<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class subcategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['name','slug', 'category', 'uploads_id','category_name'];
    protected $casts  = [
        'created_at' => 'date:d-M-Y h:s A',

    ];
    protected $appends = ['posts_items', 'category_name','status_name'];
   /**
    * Get the category that owns the subcategory
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function category(): BelongsTo
   {
       return $this->belongsTo(category::class, 'category_id', 'id');
   }
   
   public function getStatusNameAttribute()
    {
        return $this->status == 1 ? 'Active' : 'Inactive';
    }


   // Mutator if you need to set the value
//    public function setStatusAttribute($value)
//    {
//        $this->attributes['status'] = ($value === 'Active') ? 1 : 0;
//    }

   public function getCategoryNameAttribute(){
    return $this->category->name ?? null;
   }

   public function getPostsItemsAttribute(){
        return $this->hasMany(post::class, 'subcategory_id')->count();
   }
}
