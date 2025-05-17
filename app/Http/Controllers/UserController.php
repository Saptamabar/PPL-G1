<?php

namespace App\Http\Controllers;

use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\error;

class UserController extends Controller
{
    public function index()
    {
        $karyawan = User::where('role', 'karyawan')->latest()->paginate(10);
        return view('admin.Karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('admin.Karyawan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'email.unique' => 'Email sudah terdaftar'
        ]);

        try {
            User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'role' => 'karyawan',
            ]);

            return redirect()->route('karyawan.index')
                        ->with('success', 'Akun karyawan berhasil dibuat');

        } catch (\Exception $e) {
            return back()->withInput()
                    ->with('error', 'Gagal membuat akun: '.$e->getMessage());
        }
    }

    public function show(User $user)
    {
        return view('admin.Karyawan.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.Karyawan.edit', compact('user'));
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
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password berhasil direset');
    }
}
