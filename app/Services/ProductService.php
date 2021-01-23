<?php

namespace App\Services;

use App\Utils\Utils;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{   
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    } 

    public function store(Array $input) : void
    {
        DB::beginTransaction();
        $input['category_id'] = $this->categoryService->unhashId($input['category_id']);
        $product = new Product;
        $product = $product->create($input);
        $this->storeImages($product, $input);
        DB::commit();
    }   
    
    public function storeImage(UploadedFile $newImage, int $id) : void
    {
        $product = Product::findOrFail($id);
        $path = $this->getPath($product);
        $newImageName = Utils::createImageName($newImage);
        $totalImages = is_null($product->images) ? 0 : count($product->images);
        $currentImages = $product->images;
        $currentImages[$totalImages] = $newImage->storeAs($path, $newImageName);
        $product->images = $currentImages;
        $product->update();
    }

    public function storeImages(Product $product, Array $input) : void
    {
        $inputImages = [];
        $path = $this->getPath($product);

        if($input['main_image']) 
        { 
            $newImageName = Utils::createImageName($newImage);
            $inputImages['main_image'] = $input['main_image']->storeAs($path, $newImageName);
        }
        
        if($input['images'])
        {
            foreach($input['images'] as $key => $image)
            {
                $newImageName = Utils::createImageName($newImage);
                $inputImages['images'][$key] = $input['images'][$key]->storeAs($path, $newImageName);   
            }
        }

        $product->main_image = $inputImages['main_image'];
        $product->images = $inputImages['images'];
        $product->update($inputImages);
    }

    public function update(Array $input, int $id) : void
    {
        $product = Product::findOrFail($id);
        $input['category_id'] = $this->categoryService->unhashId($input['category_id']);
        $product->update($input);
    }

    public function updateImage(UploadedFile $newImage, int $id, int $imageId) : void
    {
        $product = Product::findOrFail($id);
        $path = $this->getPath($product);
        $newImageName = Utils::createImageName($newImage);

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