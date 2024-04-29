<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\LikePost;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class LikePostController extends Controller
{
    public function show($post)
    {
        $likePosts = LikePost::where('user_id', $post)->get();
        $categories = Category::all();
        $tags = Tag::all();
        foreach ($likePosts as $lp) {
            $post = Post::findOrFail($lp->post_id);
            $lp->post = $post;
        }
        return view('post-like', compact('likePosts', 'categories', 'tags'));
    }

    public function store(Post $post)
    {
        $user = auth()->user();
        $user->likePosts()->create([
            'post_id' => $post->id,
        ]);
        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $user = auth()->user();
        $user->likePosts()->where('post_id', $post->id)->delete();
        return redirect()->back();
    }
}
