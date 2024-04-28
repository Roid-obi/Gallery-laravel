<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $tags = null;

        // Cek peran pengguna
        if(auth()->user()->role === 'user') {
            // Jika peran pengguna adalah 'user', ambil tag yang dibuat oleh pengguna tersebut
            $tags = Tag::where('created_by', auth()->user()->name)
                        ->where(function ($query) use ($search) {
                            $query->where('name', 'like', "%$search%")
                                  ->orWhere('description', 'like', "%$search%");
                        })
                        ->paginate(10);
        } else {
            // Jika peran pengguna bukan 'user', ambil semua tag
            $tags = Tag::where('name', 'like', "%$search%")
                        ->orWhere('created_by', 'like', "%$search%")
                        ->orWhere('description', 'like', "%$search%")
                        ->paginate(10);
        }
        
        return view('tags', compact('tags', 'search'));
    }

    public function store(Request $request)
    {
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->created_by = auth()->user()->name;
        $tag->save();

        return redirect()->route('tag.index');
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json([
                'message' => 'Tag not found'
            ], 404);
        }

        $tag->name = $request->name;
        $tag->description = $request->description;
        $tag->created_by = auth()->user()->name;
        $tag->save();

        // Tambahkan logika lainnya jika diperlukan

        return redirect()->route('tag.index');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return response()->json([
                'message' => 'Tag not found'
            ], 404);
        }

        $tag->delete();

        // Tambahkan logika lainnya jika diperlukan

        return redirect()->route('tag.index');
    }
}
