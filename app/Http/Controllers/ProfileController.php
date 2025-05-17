<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin')
        {
            return view('admin.profile.index');
        }
        else
        {
            return view('karyawan.profile.index');
        }
    }


    public function edit()
    {
        return view('admin.profile.edit');
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'no_hp' => $validated['phone'] ?? null,
        ]);

        return redirect()->route('profile.index')->with('success', 'Profile updated successfully!');
    }


    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = Auth::user();

        if ($user->foto_profile && Storage::disk('cloudinary')->exists($user->foto_profile)) {
            Storage::disk('cloudinary')->delete($user->foto_profile);
        }

        // Simpan foto baru
        $path = $request->file('photo')->store('profile-photos', 'cloudinary');
        $user->foto_profile = $path;
        $user->save();

        return back()->with('success', 'Profile photo updated successfully!');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
        ]);

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with('success', 'Password updated successfully!');
    }
}
