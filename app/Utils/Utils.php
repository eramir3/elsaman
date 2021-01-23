<?php

namespace App\Utils;

use Illuminate\Http\UploadedFile;

class Utils 
{
    public static function createImageName(UploadedFile $image) : String
    {
        $imageName = hexdec(\uniqid()). '.' . $image->getClientOriginalExtension();
        return $imageName;
    }
}