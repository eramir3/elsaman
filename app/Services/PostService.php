<?php

namespace App\Services;

use App\Utils\Utils;
use App\Models\Post;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    } 

    public function all() 
    {
        $posts = Post::with('category')->get();
        return $posts;
    }

    public function store(Array $input) : void
    {
        DB::beginTransaction();
        $input['category_id'] = $this->categoryService->unhashId($input['category_id']);
        $post = new Post;
        $post = $post->create($input);
        $this->storeImage($post, $input);
        DB::commit();
    }

    public function storeImage(Post $post, Array $input) : void
    {
        $image = null;
        $path = $this->getPath($post);

        if ($input['image'] != null)
        {
            $name = Utils::createImageName($input['image']);
            $image = $input['image']->storeAs($path, $name);
        }
        $post->image = $image;
        $post->update();
    }

    public function findById(int $id) : Post
    {
        $post = Post::findOrFail($id);
        return $post;
    }

    public function update(Array $input, int $id) : void
    {
        $post = Post::findOrFail($id);
        $input['category_id'] = $this->categoryService->unhashId($input['category_id']);
        $path = $this->getPath($post);

        if (isset($input['image']))
        {
            $name = Utils::createImageName($input['image']);
            $input['image'] = $input['image']->storeAs($path, $name);
        }
        
        $post->update($input);
    }

    public function destroy(int $id) : void
    {
        $post = Post::findOrFail($id); 
        $path = $this->getPath($post);
        Storage::deleteDirectory($path);
        $post->delete();
    }

    private function getPath(Post $post) : String
    {
        return 'images/posts/'. $post->id;
    }
}