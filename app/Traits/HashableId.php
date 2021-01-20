<?php

namespace App\Traits;

use App\Services\HasherService;

trait HashableId 
{
    public function gethashIdAttribute()
    {
        return HasherService::encode($this->attributes['id']);
    }
}