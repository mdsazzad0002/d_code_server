<?php

use App\Models\category;
use App\Models\GeneralSetting;
use App\Models\subcategory;
use App\Models\uploads;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

function static_asset($string_data)
{
    return asset('public/' . $string_data);
}

function file_type($file_mime_type, $file_extension)
{
    if ($file_mime_type == 'image') {
        $image = ['png', 'jpg', 'gif', 'webp', 'jpeg'];
        $file_extension = strtolower($file_extension);
        if (in_array($file_extension, $image)) {
            return true;
        }
    }else{
        return false;
    }
}

function uploads($file, $id = null)
{
    $file_extension = $file->getClientOriginalExtension();
    $file_name = (rand (1000,100000).time() * 40202) . '.' . $file_extension;

    $file_temp_name  =  $file->getRealPath();
    $file_size = $file->getSize();

    $file_mime_type = $file->getMimeType();
    $file_mime_type = explode('/', $file_mime_type)[0];

    if (file_type($file_mime_type, $file_extension)) {
        $destinationPath = public_path() . '/uploads/';
        $file->move($destinationPath, $file_name);
        if ($id != null) {
            $file_find = uploads::find($id);
            if ($file_find) {
                if (file_exists($destinationPath . $file_find->name)) {
                    unlink($destinationPath . $file_find->name);
                }
                $file_find->name = $file_name;
                $file_find->extension = $file_extension;
                $file_find->size = $file_size;
                $file_find->save();
            } else {
                uploads::create([
                    'name' => $file_name,
                    'extension' => $file_extension,
                    'size' => $file_size,
                    // 'extension'=>$external_link,
                ]);
            }
        } else {
            uploads::create([
                'name' => $file_name,
                'extension' => $file_extension,
                'size' => $file_size,
                // 'extension'=>$external_link,
            ]);
        }
    }
    //Move Uploaded File
    return uploads::where('name', $file_name)->get()->first()->id;
}

function dynamic_asset($id)
{
    $destinationPath = 'uploads/';
    if ($id != null || $id != '') {
        if ($file1 = uploads::find($id)) {
            $file1 = $destinationPath . $file1->name;
            if (File::exists(public_path($file1)) || is_dir(public_path($file1))) {
                return static_asset($file1);
            } else {
                $file = $destinationPath . 'fixing.jpg';
                return static_asset($file);
            }
        } else {
            $file = $destinationPath . 'fixing.jpg';
            return static_asset($file);
        }
    }else{
        $file = $destinationPath . 'fixing.jpg';
        return static_asset($file);
    }
}


function asset_unlink($id)
{
    $destinationPath = 'uploads/';
    if ($id != null || $id != '') {
        $file1 = $destinationPath . uploads::find($id)->name;
        // return static_asset($file1);
        if (File::exists(public_path($file1)) || is_dir(public_path($file1))) {
            if(unlink( public_path($file1))){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }
    return false;
}

function category_head($items){
    return category::where('status', 1)->select('name','slug')->limit($items)->get();
}
function category_subcategory($category_slug, $items){
    $category_id = category::where('status', 1)->where('slug',$category_slug)->get()->first();
    if($category_id){
        return subcategory::where('status', 1)->where('category_id', $category_id->id)->select('name','slug')->limit($items)->get();
    }
}


function general_setting($key){
    $value = GeneralSetting::where('key', $key)->select('title')->get()->first();
    if($value){
        $value = $value->title;
        if (str_contains($key, 'logo')) {
            $value = dynamic_asset($value);
        }
        return $value;
    }else{
        return false;
    }

}

function vote_cookie($commnent_id){
    return $_COOKIE[$commnent_id] ??  FALSE ;
}
