<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasAttributes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens as SanctumHasApiTokens;

class ProfileController extends Controller
{
    use HasAttributes, HasFactory;

    
    public function show($id = null)
    {
        if($id == null){
            $users = auth()->user();
            $posts = $users->Posts;
        }
        else{
            $users = User::findOrFail($id);
            $posts = $users->Posts;
        }

        return view('pages.profile', compact('users', 'posts'));
    }

    public function edit($id)
    {
        $users = auth()->user();

        return view('pages.edit', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);

        // Validasi input
        $validatedData = $request->validate([
            'name' => 'string|max:255',
            'status' => 'string|max:255',
            'description' => 'string|max:255',
            'address' => 'string|max:255',
            'birthdate' => 'date',
            'image_path' => 'image|mimes:jpeg,png,jpg,gif'
        ]);

        // Menghapus semua field dari array $validatedData yang memiliki nilai kosong atau null
        $validatedData = array_filter($validatedData, function ($value) {
            return $value !== null && $value !== '';
        });

        // Menyimpan gambar ke dalam folder "public/profile_images"
        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('img/profile'), $imageName);
            $validatedData['image_path'] = $imageName;
        }

        // Mengisi atribut-atribut pada model dengan data yang valid
        $users->fill($validatedData);

        // Menyimpan perubahan ke dalam database
        $users->save();

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Hapus akun pengguna
        $user = User::findOrFail($id);
        $user->delete();

        // Logout pengguna
        Auth::logout();

        return redirect()->route('login')->with('success', 'Akun berhasil dihapus.');
    }

}
