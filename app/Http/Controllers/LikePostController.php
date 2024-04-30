<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\LikePost; // Mengganti SavePost dengan LikePost
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class LikePostController extends Controller
{
    public function show($post)
    {
        $postLikes = LikePost::where('post_id', $post)->get();
        $categories = Category::all();
        $tags = Tag::all();
        foreach ($postLikes as $pl) {
            $post = Post::findOrFail($pl->post_id);
            $pl->post = $post;
        }
        return view('post-like', compact('postLikes'));
    }

    public function store(Post $post)
    {
        $user = auth()->user();
        $user->LikedPosts()->create([ 
            'post_id' => $post->id,
        ]);
        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        LikePost::where('post_id', $post->id)->delete();
        return redirect()->back();
    }
}
