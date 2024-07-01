<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug', 'category', 'uploads_id'];


   /**
    * Get the category that owns the subcategory
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
   public function category(): BelongsTo
   {
       return $this->belongsTo(category::class, 'category_id', 'id');
   }


   public function getCategoryNameAttribute(){
    return $this->category->name ?? null;
   }
}
