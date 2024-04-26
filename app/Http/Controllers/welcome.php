<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\comment;
use App\Models\post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class welcome extends Controller
{
    public function index() 
    {
        return view('viewcen.viewcen',[
            'pinnedPosts' => Post::latest()->where('is_pinned',true)->get(),
            "title"=> "Postingan",
            'posts' => Post::latest()->paginate(15),
        ]);
    }

    public function posts(Request $request) {
        $search = $request->input('search');
        $categories = Category::all();
        $tags = Tag::all();
        $title = "Semua Postingan";
        $posts = Post::where('title', 'like', "%$search%")
            ->orWhere('created_by', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")
            // ->get();
            ->paginate(20); // menampilkan 10 data per halaman
        return view('viewcen.posts-viewcen', compact('posts', 'categories', 'tags', 'search','title'));
    }


// halaman detail
    public function show($slug)
    {
    
        $post = post::where('slug', $slug)->firstOrFail(); //agar urlnya slug
        $post->increment('views');
        $comments = Comment::where('post_id', $post->id)->with('user')->get(); //comment untuk postnya dipost tersebut
        return view('viewcen.detail-viewcen', [
            'post' => $post,
            'comments' => $comments,
        ]);
    }





     // comment post
     public function StoreComment(Request $request){
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'post_id' => 'required|exists:posts,id',
            'content' => 'required|string|min:3|max:255',
            'parent_id' => 'nullable|exists:comments,id',
        ]);
        $comment = comment::create($data);

        if ($data['parent_id']) {
            $parentComment = Comment::find($data['parent_id']);
            $parentComment->replies()->save($comment);
        }
        return redirect()->back();
    }

    // update comment
    public function update(Request $request, comment $comment)
    {
        $request->validate([
            'content' => 'required',
        ]);
    
        $comment->content = $request->content;
        $comment->save();
    
        return redirect()->back();
    }
    
   

    // delate comment
    public function destroy($id)
    {
        $comment = comment::findOrFail($id);

        $comment->replies()->update([
            'parent_id' => null   //reply akan dibuat null agar jadi komen induk
        ]);
        $comment->delete();
        

        return back();
    }


        // category di klik
        public function showCategory(Category $category) {
            // $tanda = " : $category->name";
            $title = "Categories : $category->name";
            $tags = Tag::all();
            $posts = $category->categories()->paginate(6);
            $pinnedPosts = $category->categories()->where('is_pinned',true)->get()->all();
            return view('viewcen.posts-viewcen',compact(['posts','tags','title']));
        }
    
    
        // tag di klik
        public function showTag(Tag $tag) {
            // $tanda = " : $tag->name";
            $title = "Tags : $tag->name";
            $tags = Tag::all();
            $posts = $tag->tags()->paginate(6);
            $pinnedPosts = $tag->tags()->where('is_pinned',true)->get()->all();
            return view('viewcen.posts-viewcen',compact(['posts','tags','title']));
        }


        // halaman category
        public function categories(Request $request) {
            $title = 'Category';
            $search = $request->input('search');
            $categories = Category::where('name', 'like', "%$search%")
                ->orWhere('created_by', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->get();
                // ->paginate(20);
            return view('viewcen.category-viewcen', compact('categories', 'search','title'));
        }
    



}
