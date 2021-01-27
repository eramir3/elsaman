<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Services\PostService;
use App\Services\CategoryService;
use App\Http\Controllers\Controller;

class LearnController extends Controller
{
    private $postService; 

    private $categoryService;

    public function __construct(PostService $postService, CategoryService $categoryService)
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
        $categories = $this->categoryService->all();
        $posts = $this->postService->all();
        return view('home.learn', compact('categories', 'posts'));
    }
}
