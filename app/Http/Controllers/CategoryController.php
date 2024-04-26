<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $categories = Category::where('name', 'like', "%$search%")
            ->orWhere('created_by', 'like', "%$search%")
            ->orWhere('description', 'like', "%$search%")
            // ->get();
            ->paginate(10); // menampilkan 10 data per halaman
        return view('categories', compact('categories', 'search'));
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->created_by = auth()->user()->name;
        $category->save();

        return redirect()->route('category.index');
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'category not found'
            ], 404);
        }

        $category->name = $request->name;
        $category->description = $request->description;
        $category->created_by = auth()->user()->name;
        $category->save();

        // Tambahkan logika lainnya jika diperlukan

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'message' => 'category not found'
            ], 404);
        }

        $category->delete();

        // Tambahkan logika lainnya jika diperlukan

        return redirect()->route('category.index');
    }
}
