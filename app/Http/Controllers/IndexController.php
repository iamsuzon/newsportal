<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $posts = Post::all()->sortBy('created_at');
        $latest = Post::orderBy('created_at', 'DESC')->limit(4)->get();
        $categories = Category::all();

        return view('welcome', compact('posts','latest', 'categories'));
    }

    public function blog()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();

        return view('blog', compact('posts','categories'));
    }

    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->first();

        abort_if($post == null ,404);

        dd($post);
    }

    public function showCategory($slug)
    {
        $category = Category::where('slug', $slug)->first();

        abort_if($category == null ,404);

        $posts = Post::where('category_id', $category->id)->get();

        dd($posts);
//        return view('admin.single_category', compact('posts', 'category'));
    }
}
