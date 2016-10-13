<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use App\Services\Slug;

use Alert;

class CategoriesController extends BaseController
{
	public function index(Category $category)
    {
    	return view('admin.categories.index')->with([
    		'categories' => $category->simplePaginate(10),
    	]);
    }

    public function create()
    {
        $this->authorize('create', Category::class);

    	return view('admin.categories.addcategory');
    }

    public function store(Request $request, Slug $slug)
    {
        $this->authorize('create', Category::class);

        $this->validate($request, [
            'name' => 'required|max:15',
            'icon' => 'required'
        ]);

        $category = new Category([
            'name' => $request->input('name'),
            'slug' => $slug->createSlug($request->input('name')),
            'icon' => $request->input('icon')
        ]);

        $category->save();

        Alert::success('Category added successfully', 'Success')->persistent("Close");

        return redirect()->route('admin.categories');
    }

    public function edit(Category $category)
    {
        $this->authorize('update', Category::class);

        return view('admin.categories.edit')->with([
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $this->authorize('update', Category::class);

        $this->validate($request, [
            'name' => 'required|max:15',
            'icon' => 'required'
        ]);

        $category->update($request->all());

        Alert::success('Category updated successfully', 'Success')->persistent("Close");

        return redirect()->route('admin.categories');
    }

    public function show(Category $category, Post $post)
    {
        $this->authorize('update', Category::class);

        return view('admin.categories.posts')->with([
            'category' => $category,
            'posts' => $category->posts()->simplePaginate(10),
        ]);
    }

    public function destroy(Category $category)
    {
        $this->authorize('update', Category::class);

        $category->delete();

        Alert::success('Category deleted successfully', 'Success')->persistent("Close");
        return redirect()->back();
    }
}
