<?php

namespace App\Services;

use App\Models\Post;
use Saman\Utils\Utils;
use Saman\Utils\Hasher;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function all() 
    {
        $posts = Post::with('category')->get();
        return $posts;
    }

    public function store(Array $input) : void
    {
        DB::beginTransaction();
        $input['category_id'] = Hasher::findModelId(Category::class, $input['category_id']);
        $post = new Post;
        $post = $post->create($input);
        $this->storeImage($post, $input);
        DB::commit();
    }

    public function storeImage(Post $post, Array $input) : void
    {
        $image = null;
        $path = $this->getPath($post);

        if (isset($input['image']))
        {
            $name = Utils::generateImageName($input['image']);
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
        $input['category_id'] = Hasher::findModelId(Category::class, $input['category_id']);
        $path = $this->getPath($post);

        if (isset($input['image']))
        {
            $name = Utils::generateImageName($input['image']);
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