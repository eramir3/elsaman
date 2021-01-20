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
            $category->create($request->validated());
            $reponse = $this->notificationService->success('Category', NotificationEnum::Create);
            return back()->with($reponse);
        }
        catch(\Exception $e)
        {
            $reponse = $this->notificationService->error('Category', NotificationEnum::CreateError);
            return back()->with($reponse);
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
            $category->update($request->validated());
            $reponse = $this->notificationService->success('Category', NotificationEnum::Update);
            return back()->with($reponse);
        }
        catch(\Exception $e)
        {
            $reponse = $this->notificationService->error('Category', NotificationEnum::UpdateError);
            return back()->with($reponse);
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
            $reponse = $this->notificationService->success('Category', NotificationEnum::Delete);
            return back()->with($reponse);
        }
        catch(\Exception $e)
        {
            $reponse = $this->notificationService->error('Category', NotificationEnum::DeleteError);
            return back()->with($reponse);
        }
    }
}
