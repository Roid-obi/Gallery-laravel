<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('edit-profile', compact('user'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'kelas' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $user = Auth::user();
        $user->name = $validatedData['name'];
        $user->kelas = $validatedData['kelas'];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images/user', $fileName);

            $previousImage = $user->image;
            if ($previousImage !== null) {
                Storage::delete('public/images/user/' . $previousImage);
            }

            $user->image = $fileName;
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
