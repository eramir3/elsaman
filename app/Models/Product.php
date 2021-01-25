<?php

namespace App\Models;

use App\Models\Category;
use App\Traits\HashableId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HashableId, SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'images' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }

    public function getMainImageAttribute($value) 
    {
        return 'storage/' . $value;
    }

    public function delete() 
    {
        $this->main_image = '';
        $this->images = [];
        $this->save();
        return parent::delete();
    }
}