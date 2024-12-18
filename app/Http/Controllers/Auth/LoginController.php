<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            return match($user->role) {
                'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
                'dosen' => redirect()->route('dosen.dashboard'),
                'admin' => redirect()->route('admin.dashboard'),
                'akademik' => redirect()->route('akademik.dashboard'),
                default => view('login_page'),
            };
        }
        return view('login_page');
    }

    public function login(Request $request)
    {
        $request->validate([
            'identifier' => 'required|string',
            'password' => 'required|string',
        ]);

        $identifier = $request->input('identifier');
        $password = $request->input('password');
        $username = Str::before($identifier, '@');

        $user = User::where('username', $username)->orWhere('email', $identifier)->first();

        if (!$user) {
            $dosen = Dosen::where('nidn', $identifier)->first();
            if ($dosen) {
                $user = User::where('email', $dosen->email)->first();
            }

            if (!$user) {
                $mahasiswa = Mahasiswa::where('nim', $identifier)->first();
                if ($mahasiswa) {
                    $user = User::where('email', $mahasiswa->email)->first();
                }
            }
        }

        if ($user && Auth::attempt(['email' => $user->email, 'password' => $password])) {
            $request->session()->regenerate();
            return $this->authenticated($request, Auth::user());
        }

        return back()->with('loginError', 'Identifier or password is incorrect!');
    }

    protected function authenticated(Request $request, $user)
    {
        return match($user->role) {
            'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
            'dosen' => redirect()->route('dosen.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            'akademik' => redirect()->route('akademik.dashboard'),
            default => redirect()->route('login'),
        };
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}