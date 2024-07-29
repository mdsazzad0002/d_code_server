<?php

namespace App\Models;

use DateTime;
use App\Models\uploads;
use App\Models\subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug'];

    protected $casts  = [
        'created_at' => 'date:d-M-Y h:s A',
    ];

    protected $appends = ['subcategory_items'];



    public function uploads(){
        return $this->belongsTo(uploads::class);
    }

    public function getSubcategoryItemsAttribute(){
        return $this->hasMany(subcategory::class, 'category_id', 'id')->where('status', 1)->count();
    }
}
