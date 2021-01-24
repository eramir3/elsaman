<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Resources\CategoryResource;
use App\Enums\NotificationEnum;
use App\Services\NotificationService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    private $notificationService; 

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
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
            $category = new Category;
            $category->name = $request['name'];
            $category->posts_active = $request['posts_active'] == null ? false : true;
            $category->products_active = $request['products_active'] == null ? false : true;
            $category->save();
            $response = $this->notificationService->success('Category', NotificationEnum::Create);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Category', NotificationEnum::CreateError);
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
            $category = Category::findOrFail($id);
            $category->name = $request['name'];
            $category->posts_active = $request['posts_active'] == null ? false : true;
            $category->products_active = $request['products_active'] == null ? false : true;
            $category->save();
            $response = $this->notificationService->success('Category', NotificationEnum::Update);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Category', NotificationEnum::UpdateError);
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
            $category = Category::findOrFail($id);
            $category->delete();
            $response = $this->notificationService->success('Category', NotificationEnum::Delete);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Category', NotificationEnum::DeleteError);
            return back()->with($response);
        }
    }
}
