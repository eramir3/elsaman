<?php

namespace App\Http\Controllers;

use App\Utils\Notifier;
use App\Enums\NotificationEnum;
use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    private $productService;
    
    private $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productService->all();
        return view('panel.admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->all();
        return view('panel.admin.product.create', compact('categories'));
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
            $this->productService->store($request->validated());
            $response = Notifier::success('Product', NotificationEnum::CREATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Product', NotificationEnum::CREATE_ERROR);
            return back()->with($response);
        }
    }

    public function storeImage(ImageRequest $request, $id)
    {
        try
        {
            $this->productService->storeImage($request['image'], $id);
            $response = Notifier::success('Image', NotificationEnum::CREATE);
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
        $product = $this->productService->findById($id);
        $categories = $this->categoryService->all();
        return view('panel.admin.product.edit', compact('product', 'categories'));
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
            $this->productService->update($request->validated(), $id);
            $response = Notifier::success('Product', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Product', NotificationEnum::UPDATE_ERROR);
            return back()->with($response);
        }
    }

    public function updateImage(ImageRequest $request, $id, $imageId) 
    {
        try
        {
            $this->productService->updateImage($request['image'], $id, $imageId);
            $response = Notifier::success('Image', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Image', NotificationEnum::UPDATE_ERROR);
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
            $response = Notifier::success('Product', NotificationEnum::DELETE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Product', NotificationEnum::DELETE_ERROR);
            return back()->with($response);
        }
    }

    public function destroyImage($id, $imageId)
    {
        try
        {
            $this->productService->destroyImage($id, $imageId);
            $response = Notifier::success('Image', NotificationEnum::DELETE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Image', NotificationEnum::DELETE_ERROR);
            return back()->with($response);
        }
    }
}
