<?php

namespace App\Utils;

use Illuminate\Http\UploadedFile;

class Utils 
{
    public static function generateImageName(UploadedFile $image) : string
    {
        $name = hexdec(\uniqid()). '.' . $image->getClientOriginalExtension();
        return $name;
    }
}