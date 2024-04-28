<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request) {
        $search = $request->input('search');
        $users = User::where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('address', 'like', "%$search%")
            // ->get();
            ->paginate(10); // menampilkan 10 data per halaman
        return view('users', compact('users', 'search'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi input jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        // Update pengguna berdasarkan input
        $user->name = $validatedData['name'] ;
        $user->email = $validatedData['email'];
        $user->address = $validatedData['address'];
        $user->save();

        // Redirect ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('users')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        
        // Hapus pengguna
        $user->delete();

        // Redirect ke halaman daftar pengguna dengan pesan sukses
        return redirect()->route('users')->with('success', 'Pengguna berhasil dihapus.');
    }
}
