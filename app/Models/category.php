<?php

namespace App\Models;

use DateTime;
use App\Models\uploads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug'];

    protected $casts  = [
        'created_at' => 'date:d-M-Y h:s A',
    ];

    protected $appends = ['subcategory'];



    public function uploads(){
        return $this->belongsTo(uploads::class);
    }

    public function getSubcategoryAttribute(){
        return $this->hasMany(subcategory::class, 'category_id')->count();
    }
}
