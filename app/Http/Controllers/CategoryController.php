<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
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

            $notification = array(
                'message' => 'Category Created Successfully',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }
        catch(\Exception $e)
        {
            $notification = array(
                'message' => 'Category Creation Failed',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Modles\CategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try
        {
            $category = Category::findOrFail($id);
            $category->update($request->validated());

            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }
        catch(\Exception $e)
        {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
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
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch(\Exception $e)
        {
            $notification = array(
                'message' => 'Category Deletion Failed',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }
}
