<?php

namespace App\Http\Controllers;

use Saman\Utils\Notifier;
use Illuminate\Http\Request;
use App\Services\PostService;
use Saman\Enums\NotificationEnum;
use App\Services\PostCategoryService;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    private $postService; 

    private $categoryService;

    public function __construct(PostService $postService, PostCategoryService $categoryService)
    {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postService->all();
        return view('panel.admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->all();
        return view('panel.admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try
        {
            $this->postService->store($request->validated());
            $response = Notifier::success('Post', NotificationEnum::CREATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Post', NotificationEnum::CREATE_ERROR);
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
        $post = $this->postService->findById($id);
        $categories = $this->categoryService->all();
        return view('panel.admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        try
        {
            $this->postService->update($request->validated(), $id);
            $response = Notifier::success('Post', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Post', NotificationEnum::UPDATE_ERROR);
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
            $this->postService->destroy($id);
            $response = Notifier::success('Post', NotificationEnum::DELETE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = Notifier::error('Post', NotificationEnum::DELETE_ERROR);
            return back()->with($response);
        }
    }
}
