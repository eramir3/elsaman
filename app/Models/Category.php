<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Product;
use App\Traits\HashableId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HashableId; //SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public function product() 
    {
        return $this->hasOne(Product::class);
    }

    public function post() 
    {
        return $this->hasOne(Post::class);
    }
}
