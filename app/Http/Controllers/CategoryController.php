<?php

namespace App\Http\Controllers;

use App\Services\CategoryService;
use App\Http\Resources\CategoryResource;
use App\Enums\NotificationEnum;
use App\Services\NotificationService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    private $categoryService;

    private $notificationService; 

    public function __construct(CategoryService $categoryService, NotificationService $notificationService)
    {
        $this->categoryService = $categoryService;
        $this->notificationService = $notificationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->all();
        return view('panels.category.index', compact('categories'));
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
            $response = $this->notificationService->success('Category', NotificationEnum::CREATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Category', NotificationEnum::CREATE_ERROR);
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
            $response = $this->notificationService->success('Category', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Category', NotificationEnum::UPDATE_ERROR);
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
            $response = $this->notificationService->success('Category', NotificationEnum::DELETE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Category', NotificationEnum::DELETE_ERROR);
            return back()->with($response);
        }
    }
}
