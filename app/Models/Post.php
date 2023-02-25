<?php

namespace App\Models;

use App\Models\Category;
use Saman\Traits\HashableId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, HashableId;

    protected $connection = 'ecommerce';

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute($value) 
    {
        return 'storage/' . $value;
    }
}
