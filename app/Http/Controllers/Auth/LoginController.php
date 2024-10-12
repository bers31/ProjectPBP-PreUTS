<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\User;
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
         // Validate the identifier and password
         $request->validate([
             'identifier' => 'required|string', // Change 'email' to 'identifier'
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
                 // If the student exists, get their email to check for authentication
                 $user = User::where('email', $student->email)->first();
             } elseif ($lecturer) {
                 // If the lecturer exists, get their email to check for authentication
                 $user = User::where('email', $lecturer->email)->first();
             } else {
                 // Identifier not found in both tables
                 return back()->withErrors(['comb-identifier' => 'The provided identifier does not match our records.'])->withInput();
             }
         }
     
         // Check if user exists and validate password
         if ($user && Auth::attempt(['email' => $user->email, 'password' => $password])) {
             $request->session()->regenerate();
             // Redirect based on user role
             return $this->authenticated($request, Auth::user());
         }
     
         // If authentication fails, return with an error message
         return back()->with('loginError', 'Email atau Password salah!');
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
