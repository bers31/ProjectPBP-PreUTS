<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

     public function showLoginForm()
     {
         // If the user is already authenticated, redirect them to the appropriate dashboard
         if (Auth::check()) {
             $user = Auth::user();
             switch ($user->role) {
                 case 'mahasiswa':
                     return redirect()->route('mahasiswa.dashboard');
                 case 'dosen':
                     return redirect()->route('dosen.dashboard');
                 case 'admin':
                     return redirect()->route('admin.dashboard');
             }
         }else{
             return view('login_page');
         }
         // If not authenticated, show the login page
     }

    public function login(Request $request)
    {
        // Validate the credentials (email and password)
        $credentials = $request->validate([
            'email' => 'required', 'email',
            'password' => 'required',
        ]);
        // $credentials = $request->only('email', 'password');
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect based on user role
            return $this->authenticated($request, Auth::user());
        }

        // If authentication fails, return with an error message
        return back()->with('loginError','Email atau Password salah!');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        // Check user role and redirect accordingly
        switch ($user->role) {
            case 'mahasiswa':  // Student
                return redirect()->route('mahasiswa.dashboard');
            case 'dosen':  // Lecturer
                return redirect()->route('dosen.dashboard');
            case 'admin':  // Admin
                return redirect()->route('admin.dashboard');
            default:
                return redirect()->route('login');  // Fallback if no role matches
        }
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        // Auth::logout();

        // Invalidate the session and regenerate the token for security
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the homepage or login page
        return redirect('/');
    }
}
