<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //admin/category   GET
        $categories = Category::orderByDesc('created_at')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //admin/category/create   GET
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //admin/category   POST
        // $category = new Category();
        // $category->name = $request->name;
        // $category->slug = $request->slug;
        // $category->description = $request->description;
        // $category->img = $request->img;
        // $category->save();
        
        // $fname = $request->file('imgUpload');
        // if($fname != null){
        //     $category->img = $fname->store('uploads');
        // }
               
        $validated = $request->validate([
            'name' => 'required|max:255',
            // 'slug' => 'required|unique:categories|max:255',
            // 'imgUpload' => 'image',
            'img' => 'max:255',
        ]);

        Category::create( $request->all() );
        return redirect('/admin/category')->with('success', 'Thank! Category added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //admin/category/{category}   GET
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //admin/category/{category}/edit   GET
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //admin/category/{category}   PUT
        $validated = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:categories,slug,'.$id.'|max:255',
            'img' => 'max:255',
        ]);

        $category = Category::findOrFail($id);

        $category->update( $request->all() );
        return redirect('/admin/category')->with('success', 'Thank! Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //admin/category/{category}   DELETE
        Category::findOrFail($id)->delete();
        return redirect('/admin/category')->with('success', 'Thank! Category deleted!');
    }
}
