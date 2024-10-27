<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CatCreateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.category',compact('categories'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.catCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CatCreateRequest $request)
    {
           
            $category = new Category();
            $category->name = $request->cat_name;
            $category->save();
            return redirect('/category')->with('message', 'Category Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        
        return view('admin.catEdit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        
        $category->name = $request->cat_name;
        $category->save();
        return redirect('category')->with('message','category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
         
    }
}
