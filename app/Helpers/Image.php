<?php

namespace App\Helpers;

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
}

?>