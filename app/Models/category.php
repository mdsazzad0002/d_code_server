<?php

namespace App\Models;

use DateTime;
use App\Models\uploads;
use App\Models\subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','slug'];

    protected $casts  = [
        'created_at' => 'date:d-M-Y h:s A',

    ];

    protected $appends = ['subcategory_items', 'status_name'];


    public function getStatusNameAttribute()
    {
        return $this->status == 1 ? 'Active' : 'Inactive';
    }



    public function uploads(){
        return $this->belongsTo(uploads::class);
    }

    public function getSubcategoryItemsAttribute(){
        return $this->hasMany(subcategory::class, 'category_id', 'id')->where('status', 1)->count();
    }
}
