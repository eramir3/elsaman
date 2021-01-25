<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Enums\NotificationEnum;
use App\Services\CategoryService;
use App\Http\Requests\PostRequest;
use App\Services\NotificationService;

class PostController extends Controller
{
    private $postService; 

    private $categoryService;

    private $notificationService; 

    public function __construct(PostService $postService, CategoryService $categoryService,
                                NotificationService $notificationService)
    {
        $this->postService = $postService;
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
        $posts = $this->postService->all();
        return view('panel.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryService->all();
        return view('panel.post.create', compact('categories'));
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
            $response = $this->notificationService->success('Post', NotificationEnum::CREATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Post', NotificationEnum::CREATE_ERROR);
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
        return view('panel.post.edit', compact('post', 'categories'));
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
            $response = $this->notificationService->success('Post', NotificationEnum::UPDATE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Post', NotificationEnum::UPDATE_ERROR);
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
            $response = $this->notificationService->success('Post', NotificationEnum::DELETE);
            return back()->with($response);
        }
        catch(\Exception $e)
        {
            $response = $this->notificationService->error('Post', NotificationEnum::DELETE_ERROR);
            return back()->with($response);
        }
    }
}
