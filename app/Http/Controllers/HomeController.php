<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $admin = User::where('role', 'admin')->get();
        $user = User::where('role', '!=', 'admin')->get();
        $posts = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('home', compact('admin', 'user', 'posts', 'categories', 'tags'));
    }

}
