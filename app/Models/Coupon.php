<?php

namespace App\Models;

use Saman\Traits\HashableId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Coupon extends Model
{
    use HasFactory, HashableId, SoftDeletes;

    protected $connection = 'ecommerce';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'discount'
    ];
}
