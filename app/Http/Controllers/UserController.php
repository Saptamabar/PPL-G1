<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function index()
    {
        $karyawan = User::where('role', 'karyawan')->latest()->paginate(10);
        return view('admin.karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('admin.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'karyawan',
        ]);

        return redirect()->route('karyawan.index')
                        ->with('success', 'Akun karyawan berhasil dibuat');
    }

    public function show(User $user)
    {
        return view('admin.karyawan.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.karyawan.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:karyawan,email,'.$user->id],
        ]);

        $user->update($request->only(['name', 'email']));

        return redirect()->route('karyawan.index')
                        ->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('karyawan.index')
                        ->with('success', 'Akun karyawan berhasil dihapus');
    }

    public function resetPassword(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password berhasil direset');
    }
}
