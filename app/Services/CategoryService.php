<?php

namespace App\Services;

use App\Utils\Hasher;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{   
    public function all(): Collection
    {
        return Category::all();
    }

    public function store(array $input): void
    {
        $category = new Category;
        $category->name = $input['name'];
        $category->posts_active = isset($input['posts_active']);
        $category->products_active = isset($input['products_active']);
        $category->save();
    }

    public function update(array $input, int $id): void
    {
        $category = Category::findOrFail($id);
        $category->name = $input['name'];
        $category->posts_active = isset($input['posts_active']);
        $category->products_active = isset($input['products_active']);
        $category->save();
    }

    public function destroy(int $id): void
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }

    public function unhashId(string $hashId): int
    {
        $id = Hasher::decode($hashId);
        Category::findOrFail($id);
        return $id;
    }    
}