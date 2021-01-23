<?php

namespace App\Services;

use App\Models\Category;
use App\Services\HasherService;

class CategoryService
{   
    private $category;

    private $hasherService;

    public function __construct(Category $category, HasherService $hasherService)
    {
        $this->category = $category;
        $this->hasherService = $hasherService;
    } 

    public function unhashId(String $hashId) : int
    {
        $id = $this->hasherService->decode($hashId);
        $this->category->findOrFail($id);
        return $id;
    }    
}