<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $tags = Tag::where('name', 'like', "%$search%")
            ->orWhere('created_by', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            // ->get();
            ->paginate(10); // menampilkan 10 data per halaman
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
