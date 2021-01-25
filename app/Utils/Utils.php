<?php

namespace App\Utils;

use Illuminate\Http\UploadedFile;

class Utils 
{
    public static function createImageName(UploadedFile $image) : string
    {
        $imageName = hexdec(\uniqid()). '.' . $image->getClientOriginalExtension();
        return $imageName;
    }
}