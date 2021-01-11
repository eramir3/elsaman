<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index() 
    {
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create() {
        return view('admin.posts.create');
    }

    public function store(Request $request) 
    {
        $input = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'mimes:jpg,jpeg,png',
            'body' => 'required'
        ]);

        if(request('post_image')) {
            $input['post_image'] = request('post_image')->store('images');
        }

        Auth::user()->posts()->create($input);
        Session::flash('message-success', "Post '". $input['title'] ."' was created successfully");
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post) 
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post) 
    {
        $input = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'mimes:jpg,jpeg,png',
            'body' => 'required'
        ]);

        if(request('post_image')) {
            $input['post_image'] = request('post_image')->store('images');
            $post->post_image = $input['post_image'];
        }

        $post->title = $input['title'];
        $post->body = $input['body'];
        $post->save();

        Session::flash('message-success', "Post '". $post->title ."' was updated successfully");
        return redirect()->route('admin.posts.index');
    }

    public function destroy(Post $post) 
    {
        $post->delete();
        Session::flash('message-success', "Post '". $post['title'] ."' was deleted successfully");
        return back();
    }
}
