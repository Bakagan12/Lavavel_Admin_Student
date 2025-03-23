<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('login.login');
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the login form data
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Authentication passed
            $user = Auth::user();
            // dd($user->role_id);
            // Redirect based on the role_id
            if ($user->role_id == 1) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role_id == 2) {
                return redirect()->route('student.dashboard');
            }
        }

        // If authentication fails, redirect back with an error
        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    // Handle the logout functionality
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    public function showCreateUserForm()
    {
        return view('auth.register'); // The view where your registration form will be
    }

    // Handle the user registration
    public function createUser(Request $request)
    {
        // Validate the user input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // If validation fails, return with errors
        if ($validator->fails()) {
            return redirect()->route('user.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Create the user with the validated data
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = 2;
        $user->save();

        // Redirect to the students page or wherever you want after successful registration
        return redirect()->route('students.index')->with('success', 'User registered successfully!');
    }

}
