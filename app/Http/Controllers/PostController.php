<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;




class PostController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $categories = Category::all();
        $tags = Tag::all();
        $posts = Post::where('title', 'like', "%$search%")
            ->orWhere('created_by', 'like', "%$search%")
            ->orWhere('content', 'like', "%$search%")
            // ->get();
            ->paginate(10); // menampilkan 10 data per halaman
        return view('posts', compact('posts', 'categories', 'tags', 'search'));
    }
        
            // menyimpan post baru ke database
            public function store(Request $request)
            {
                $validatedData = $request->validate([
                    'title' => 'required',
                    'content' => 'required',
                    'image' => 'image|mimes:jpeg,png,jpg,gif',
                ], [
                    'title.required' => 'Title harus diisi.',
                    'content.required' => 'Content harus diisi.',
                    'image.image' => 'File harus berupa gambar.',
                    'image.mimes' => 'Format file gambar yang diizinkan adalah: jpeg, png, jpg, gif.',
                ]);
                
        
                $post = new Post();
                $post->title = $validatedData['title'];
                $post->created_by = auth()->user()->name;
                $post->content = $validatedData['content'];
                $post->slug = Str::slug($validatedData['title']);
                $post->is_pinned = $request->input('is_pinned');
        
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $fileName = $image->getClientOriginalName();
                    $image->storeAs('public/images/', $fileName);
                    $post->image = $fileName;
                }
        
                $post->save();
                $post->tags()->sync($request->input('tags', []));
                $post->categories()->sync($request->input('categories', []));
        
                return redirect()->route('post.index');
            }
        
            public function update(Request $request, $id)
            {
                $validatedData = $request->validate([
                    'title' => 'required',
                    'content' => 'required',
                    'image' => 'image|mimes:jpeg,png,jpg,gif',
                ], [
                    'title.required' => 'Title harus diisi.',
                    'content.required' => 'Content harus diisi.',
                    'image.image' => 'File harus berupa gambar.',
                    'image.mimes' => 'Format file gambar yang diizinkan adalah: jpeg, png, jpg, gif.',
                ]);
        
                $post = Post::findOrFail($id);
                $post->title = $validatedData['title'];
                $post->created_by = auth()->user()->name;
                $post->content = $validatedData['content'];
                $post->slug = Str::slug($validatedData['title']);
                $post->is_pinned = $request->input('is_pinned');
        
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $fileName = $image->getClientOriginalName();
                    $image->storeAs('public/images/', $fileName);
        
                    $previousImage = $post->image;
                    if ($previousImage !== null) {
                        Storage::delete('public/images/' . $previousImage);
                    }
        
                    $post->image = $fileName;
                }
        
                $post->save();
        
                $post->tags()->sync($request->input('tags', []));
                $post->categories()->sync($request->input('categories', []));
        
                return redirect()->route('post.index');
            }
           

        
            // menghapus Post dari database
            public function destroy($id) {
                $post = Post::findOrFail($id);
                $path = public_path('storage/images/'.$post->gambar); 
                if(File::exists($path)){  //hapus file gambar
                    File::delete($path);
                }
                $post->delete();
                return redirect()->route('post.index');
            }
}
