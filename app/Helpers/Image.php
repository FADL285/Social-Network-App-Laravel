<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Image {
    
    public static function store($file)
    {
        if(request()->file($file)){
            $image = time() .'.'.request()->file($file)->extension();
            request()->file($file)->storeAs('public',$image);
            return url('storage/'.$image);
        }else {
            return null;
        }
    }

    public static function update($newFile,$oldFile)
    {
        if(request()->file($newFile)){
            // Delete Old File
            Storage::delete(str_replace(url('/storage'),'/public',$oldFile));

            // Store New File
            $image = time() .'.'.request()->file($newFile)->extension();
            request()->file($newFile)->storeAs('public',$image);
            return url('storage/'.$image);
        }else {
            return $oldFile;
        }
    }

    public static function delete($file)
    {
        Storage::delete(str_replace(url('/storage'),'/public',$file));
    }
}

?>