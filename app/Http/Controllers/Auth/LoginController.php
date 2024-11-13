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
        // Validate input
        $request->validate([
            'identifier' => 'required|string', // Username, email, NIDN, or NIM
            'password' => 'required|string',
        ]);
    
        // Get identifier and password from request
        $identifier = $request->input('identifier');
        $password = $request->input('password');
        $username = Str::before($identifier, '@'); // Extracts username from email if given
    
        // Attempt to find user by username or email directly
        $user = User::where('username', $username)
                    ->orWhere('email', $identifier)
                    ->first();
    
        // If user is not found, try to locate user via dosen or mahasiswa tables
        if (!$user) {
            // Check in dosen table with NIDN
            $dosen = Dosen::where('nidn', $identifier)->first();
            if ($dosen) {
                $user = User::where('email', $dosen->email)->first();
            }
    
            // Check in mahasiswa table with NIM if not found in dosen
            if (!$user) {
                $mahasiswa = Mahasiswa::where('nim', $identifier)->first();
                if ($mahasiswa) {
                    $user = User::where('email', $mahasiswa->email)->first();
                }
            }
        }
    
        // Authenticate if user is found and credentials are valid
        if ($user && Auth::attempt(['email' => $user->email, 'password' => $password])) {
            $request->session()->regenerate();
            return $this->authenticated($request, Auth::user());
        }
    
        // If authentication fails, return with error
        return back()->with('loginError', 'Identifier or password is incorrect!');
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
