<?php

namespace App\Utils;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;

class Hasher
{
    /**
     * Encode parameter
     */
    public static function encode($object)
    {
        $object = app(Hashids::class)->encode($object);
        return $object;
    }

    /**
     * Decode parameter
     */
    public static function decode($enc)
    {
        if (is_int($enc)) {
            return $enc;
        }
        return app(Hashids::class)->decode($enc)[0];
    }

    /**
     * Find id of model class hashed id
     * 
     * @param  Illuminate\Database\Eloquent\Model $class
     * @param  string  $hashId
     */
    public static function findModelId($class, string $hashId)
    {
        if(!is_subclass_of($class, Model::class))
        {
            throw new \Exception('Invalid class');
        }
        $id = self::decode($hashId);
        return $class::findOrFail($id)->id;
    }
}