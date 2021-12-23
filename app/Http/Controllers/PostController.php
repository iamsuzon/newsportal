<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\UsedCategory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'post_title' => 'required|max:300',
            'category' => 'required',
            'description' => 'required|min:100',
            'post_thumbnail' => 'required|image|mimes:jpeg,jpg,png,gif|max:3072',
        ]);

        $imageName = time().'.'.$request->post_thumbnail->extension();
        $imagePath = 'uploads/images/'.$imageName;
        $request->post_thumbnail->move(public_path('uploads/images'), $imageName);

        $post = new Post();
        $post->title = $request->post_title;
        $post->category_id = $request->category;
        $post->description = $request->description;
        $post->thumbnail = $imageName;
        $post->path = $imagePath;
        $post->save();

        return back()->with('success', 'The Post is Added.');
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();

        abort_if($post == null, 404);

        $post->title = $request->post_title;
        $post->category_id = $request->category;
        $post->description = $request->description;

        if ($request->hasFile('post_thumbnail'))
        {
            $this->validate($request, [
                'post_thumbnail' => 'required|image|mimes:jpeg,jpg,png,gif|max:3072',
            ]);

            unlink($post->path);

            $imageName = time().'.'.$request->post_thumbnail->extension();
            $imagePath = 'uploads/images/'.$imageName;
            $request->post_thumbnail->move(public_path('uploads/images'), $imageName);

            $post->thumbnail = $imageName;
            $post->path = $imagePath;
        }

        $post->save();

        return back()->with('success', 'The Post is Updated.');
    }

    public function destroy($id)
    {
        $post = Post::where('id', $id)->first();

        abort_if($post == null, 404);

        unlink($post->path);
        $post->delete();

        return back()->with('success', 'The Post is Deleted.');
    }
}
