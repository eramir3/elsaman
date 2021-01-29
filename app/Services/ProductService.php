<?php

namespace App\Services;

use Saman\Utils\Utils;
use Saman\Utils\Hasher;
use Saman\Models\Product;
use Saman\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{   
    public function all()
    {
        return Product::with('category')->get();
    }

    public function store(Array $input) : void
    {
        DB::beginTransaction();
        $input['category_id'] = Hasher::findModelId(Category::class, $input['category_id']);
        $product = new Product;
        $product = $product->create($input);
        $this->storeImages($product, $input);
        DB::commit();
    }   
    
    public function storeImage(UploadedFile $newImage, int $id) : void
    {
        $product = Product::findOrFail($id);
        $path = $this->getPath($product);
        $newImageName = Utils::generateImageName($newImage);
        $totalImages = is_null($product->images) ? 0 : count($product->images);
        $currentImages = $product->images;
        $currentImages[$totalImages] = $newImage->storeAs($path, $newImageName);
        $product->images = $currentImages;
        $product->update();
    }

    public function storeImages(Product $product, Array $input) : void
    {
        $images = [];
        $path = $this->getPath($product);

        if($input['main_image']) 
        { 
            $name = Utils::generateImageName($input['main_image']);
            $product->main_image = $input['main_image']->storeAs($path, $name);
        }
        
        if(isset($input['images']))
        {
            foreach($input['images'] as $key => $image)
            {
                $image = $input['images'][$key];
                $name = Utils::generateImageName($image);
                $images[$key] = $image->storeAs($path, $name);   
            }
        }

        $product->images = $images;
        $product->update();
    }

    public function findById(int $id) : Product
    {
        $product = Product::findOrFail($id);
        return $product;
    }

    public function update(Array $input, int $id) : void
    {
        $product = Product::findOrFail($id);
        $input['category_id'] = Hasher::findModelId(Category::class, $input['category_id']);
        $product->update($input);
    }

    public function updateImage(UploadedFile $newImage, int $id, int $imageId) : void
    {
        $product = Product::findOrFail($id);
        $path = $this->getPath($product);
        $newImageName = Utils::generateImageName($newImage);

        if ($imageId == \Config::get('constants.main_image'))
        {
            $currentImage = $product->main_image;
            $product['main_image'] = $newImage->storeAs($path, $newImageName);
            $product->update();
            unlink($currentImage);
        }
        else 
        {
            $currentImage = $product->images[$imageId];
            $images = $product->images;
            $images[$imageId] = $newImage->storeAs($path, $newImageName);
            $product->images = $images;
            $product->update();
            unlink('storage/'.$currentImage);
        }
    }

    public function destroy(int $id) : void
    {
        $product = Product::findOrFail($id); 
        $path = $this->getPath($product);
        Storage::deleteDirectory($path);
        $product->delete();
    }

    public function destroyImage(int $id, int $imageId) : void
    {
        $product = Product::findOrFail($id); 
        $images = $product->images;
        $path = $images[$imageId];
        array_splice($images, $imageId, 1);
        $product['images'] = $images;
        $product->save();
        unlink('storage/'.$path);
    }

    private function getPath(Product $product) : String
    {
        return 'images/products/'. $product->id;
    }
}