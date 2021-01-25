<?php

namespace App\Traits;

use App\Utils\Hasher;

trait HashableId 
{
    public function gethashIdAttribute()
    {
        return Hasher::encode($this->attributes['id']);
    }
}