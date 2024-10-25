<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Show the login form
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function showLoginForm(): Response|RedirectResponse
    {
        // If the user is already authenticated, redirect them to the appropriate dashboard
        if (Auth::check()) {
            $user = Auth::user();
            return match ($user->role) {
                'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
                'dosen' => redirect()->route('dosen.dashboard'),
                'admin' => redirect()->route('admin.dashboard'),
                default => redirect()->route('login'),
            };
        }
        
        // If not authenticated, show the login page
        return response()->view('login_page');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        // First, check if user is already logged in
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        // Validate the identifier and password
        $request->validate([
            'identifier' => 'required|string',
            'password' => 'required|string',
        ]);
    
        // Get the identifier and password from the request
        $identifier = $request->input('identifier');
        $password = $request->input('password');
    
        // Initialize the user variable
        $user = null;
    
        // Check if the identifier is an email
        if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $identifier)->first();
        } else {
            // If it's not an email, check in Students and Lecturers tables
            $student = Mahasiswa::where('nim', $identifier)->first();
            $lecturer = Dosen::where('nip', $identifier)->first();
    
            if ($student) {
                $user = User::where('email', $student->email)->first();
            } elseif ($lecturer) {
                $user = User::where('email', $lecturer->email)->first();
            } else {
                return back()
                    ->withErrors(['identifier' => 'The provided identifier does not match our records.'])
                    ->withInput();
            }
        }
    
        // Check if user exists and validate password
        if ($user && Auth::attempt(['email' => $user->email, 'password' => $password])) {
            $request->session()->regenerate();
            return $this->authenticated($request, Auth::user());
        }
    
        return back()->with('loginError', 'Email atau Password salah!');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user): RedirectResponse
    {
        return match ($user->role) {
            'mahasiswa' => redirect()->route('mahasiswa.dashboard'),
            'dosen' => redirect()->route('dosen.dashboard'),
            'admin' => redirect()->route('admin.dashboard'),
            default => redirect()->route('login'),
        };
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}