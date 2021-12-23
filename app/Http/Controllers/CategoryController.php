<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
           'category_title' => 'required|max:200'
        ]);

        $category = new Category();
        $category->title = trim(strtolower($request->category_title));
        $category->save();

        return back()->with('success', 'The Category is Added.');
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();

        abort_if($category == null ,404);

        $posts = Post::where('category_id', $category->id)->get();

        return view('admin.single_category', compact('posts', 'category'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'category_title' => 'required|max:200'
        ]);

        $category = Category::where('id', $request->id)->first();
        $category->title = trim(strtolower($request->category_title));
        $category->save();

        return back()->with('success', 'The Category is Updated.');
    }

    public function destroy($id)
    {
        $category = Category::where('id',$id)->first();
        abort_if($category == null, 404);

        $category->delete();

        return back()->with('success', 'The Category is Deleted.');
    }
}
