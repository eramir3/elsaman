<?php

namespace App\Services;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

class HasherService
{
    public static function encode($object)
    {
        $object = app(Hashids::class)->encode($object);
        return $object;
    }

    public static function decode($enc)
    {
        if (is_int($enc)) {
            return $enc;
        }
        return app(Hashids::class)->decode($enc)[0];
    }
}