<?php

namespace App\Traits;

use Hashids\Hashids;
use Illuminate\Support\Facades\Crypt;
use App\Services\HasherService;


trait HashableId 
{
    public function getIdAttribute($id)
    {
        $hashid = HasherService::encode($id);
        return $hashid;
    }
}