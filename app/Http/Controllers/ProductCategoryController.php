<?php

namespace App\Http\Controllers;

use Saman\Utils\Notifier;
use Saman\Enums\NotificationEnum;
use App\Services\ProductCategoryService;
use App\Http\Requests\CategoryRequest;

class ProductCategoryController extends Controller
{
    private $categoryService; 

    public function __construct(ProductCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->all();
        return view('panel.admin.product-category.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try
        {
            $this->categoryService->store($request->validated());
            $response = Notifier::success('Category', NotificationEnum::CREATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Category', NotificationEnum::CREATE_ERROR);
            return back()->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try
        {
            $this->categoryService->update($request->validated(), $id);
            $response = Notifier::success('Category', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Category', NotificationEnum::UPDATE_ERROR);
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
            $this->categoryService->destroy($id);
            $response = Notifier::success('Category', NotificationEnum::DELETE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Category', NotificationEnum::DELETE_ERROR);
            return back()->with($response);
        }
    }
}
