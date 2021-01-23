<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Enums\NotificationEnum;
use App\Services\HasherService;
use App\Services\ProductService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Services\NotificationService;
use App\Http\Requests\ImageRequest;

class ProductController extends Controller
{
    private $productService; 

    private $notificationService; 

    public function __construct(ProductService $productService, NotificationService $notificationService)
    {
        $this->productService = $productService;
        $this->notificationService = $notificationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('panels.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('panels.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Request\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try
        {
            $input = $request->validated();
            $this->productService->store($input);
            $response = $this->notificationService->success('Product', NotificationEnum::Create);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Product', NotificationEnum::CreateError);
            return back()->with($response);
        }
    }

    public function storeImage(ImageRequest $request, $id)
    {
        try
        {
            $newImage = $request['image'];
            $this->productService->storeImage($newImage, $id);
            $response = $this->notificationService->success('Image', NotificationEnum::Create);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $e->getMessage();
            return back()->with($response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('panels.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try
        {
            $input = $request->validated();
            $this->productService->update($input, $id);
            $response = $this->notificationService->success('Product', NotificationEnum::Update);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Product', NotificationEnum::UpdateError);
            return back()->with($response);
        }
    }

    public function updateImage(ImageRequest $request, $id, $imageId) 
    {
        try
        {
            $newImage = $request['image'];
            $this->productService->updateImage($newImage, $id, $imageId);
            $response = $this->notificationService->success('Image', NotificationEnum::Update);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Image', NotificationEnum::UpdateError);
            return back()->with($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $this->productService->destroy($id);
            $response = $this->notificationService->success('Product', NotificationEnum::Delete);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Product', NotificationEnum::DeleteError);
            return back()->with($response);
        }
    }

    public function destroyImage($id, $imageId)
    {
        try
        {
            $this->productService->destroyImage($id, $imageId);
            $response = $this->notificationService->success('Image', NotificationEnum::Delete);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Image', NotificationEnum::DeleteError);
            return back()->with($response);
        }
    }
}
