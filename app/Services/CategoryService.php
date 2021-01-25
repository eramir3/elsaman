<?php

namespace App\Services;

use App\Models\Category;
use App\Services\HasherService;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{   
    private $hasherService;

    public function __construct(HasherService $hasherService)
    {
        $this->hasherService = $hasherService;
    } 

    public function all(): Collection
    {
        return Category::all();
    }

    public function store(array $input): void
    {
        $category = new Category;
        $category->name = $input['name'];
        $category->posts_active = $input['posts_active'] == null ? false : true;
        $category->products_active = $input['products_active'] == null ? false : true;
        $category->save();
    }

    public function update(array $input, int $id): void
    {
        $category = Category::findOrFail($id);
        $category->name = $input['name'];
        $category->posts_active = isset($input['posts_active']) ? true : false;
        $category->products_active = isset($input['products_active']) ? true : false;
        $category->save();
    }

    public function destroy(int $id): void
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }

    public function unhashId(string $hashId): int
    {
        $id = $this->hasherService->decode($hashId);
        Category::findOrFail($id);
        return $id;
    }    
}