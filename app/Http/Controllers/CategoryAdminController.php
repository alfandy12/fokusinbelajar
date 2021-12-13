<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Singlecourse;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = Category::paginate(8)->withQueryString();
        return view('admin/category/index', [
            'categories' => $category
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/category/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validateData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        $newCategory = new Category();
        $newCategory->name = $validateData['name'];
        $newCategory->slug = $validateData['slug'];
        $newCategory->save();
        return redirect('/admin-category')->with('success', 'Data has been successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $slug)
    {
        //
        $categorySearch = Category::where('slug', $slug)->firstOrFail();
        /* dd($categoryById->id); */
        return view('admin/category/edit', [
            'categories' => $categorySearch
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $slug)
    {
        $categoryById = Category::where('slug', $slug)->firstOrFail();
        $changeCategory = Category::find($categoryById->id);

        $validateData = $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $categoryById->id,
        ]);

        $changeCategory->name = $validateData['name'];
        $changeCategory->slug = $validateData['slug'];
        $changeCategory->update();
        return redirect('/admin-category')->with('success', 'Data has been successfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $slug)
    {
        //
        $categoryById = Category::where('slug', $slug)->firstOrFail();
        $category = Category::find($categoryById->id);
        $category->Singlecourse()->delete();
        $category->Multicourse()->delete();
        $category->delete();
        return redirect('/admin-category')->with('success', 'Data has been successfully deleted');
    }
}
