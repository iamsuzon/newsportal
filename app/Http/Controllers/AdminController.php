<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.dashboard', compact('posts','categories'));
    }

    public function category()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function post()
    {
        $categories = Category::all();
        return view('admin.post', compact('categories'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->search;
        $search = Post::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')
            ->get();

        return view('admin.search', compact('search', 'searchQuery'));
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function settingsUpdate(Request $request, $id)
    {
        $this->validate($request,[
           'email' => 'email',
        ]);

        $admin = Admin::where('id', $id)->first();

        abort_if($admin == null, 404);

        $admin->name = $request->name;
        $admin->email = trim(strtolower($request->email));

        if ($request->password != null)
        {
            $this->validate($request,[
                'password' => 'min:6',
            ]);

            $admin->password = Hash::make($request->password);
        }

        $admin->save();

        return back()->with('success', 'The Admin Credentials are Updated.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
