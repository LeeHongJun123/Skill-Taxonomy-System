<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password; // Add this line to import the Password rule

class AuthController extends Controller
{
    public function register() {
        return view('hrs.register');
    }

    public function store(Request $request) {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->permision = $request->permision; 

        $user->save();

        return back()->with('Success', 'Registered successfully');
    }

    public function login() {
        return view("login");
    }

    public function loginPost(Request $request){
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            $user = Auth::user();
            
            // Check if the user is suspended
            if ($user->profile && $user->profile->status == 'Suspended') {
                Auth::logout();
                return back()->with('error', 'Your account is suspended. For more information, please contact our organization.');
            }

            switch ($user->permision) {
                case 'Manager':
                    return redirect()->route('home')->with('success','Login successfully');
                case 'HR':
                    return redirect()->route('hr.home')->with('success','Login successfully');
                case 'Employee':
                    return redirect()->route('erole.index')->with('success','Login successfully');
                default:
                    Auth::logout();
                    return back()->with('error', 'Email or Password wrong');
            }
        } 
        return back()->with('error', 'Email or Password wrong');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('Hrview.profile')->with('success', 'User deleted successfully!');
    }

    public function showChangePasswordForm()
    {
        return view('hr.change'); // Ensure this view exists
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => ['required', 'confirmed', Password::defaults()],
        ]);
    
        $user = Auth::user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }
    
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        switch ($user->permision) {
            case 'Manager':
                return redirect()->route('home')->with('success', 'Password changed successfully!');
            case 'HR':
                return redirect()->route('hr.home')->with('success', 'Password changed successfully!');
            case 'Employee':
                return redirect()->route('erole.index')->with('success', 'Password changed successfully!');
            default:
                return redirect()->route('login')->with('success', 'Password changed successfully!');
        }
    }
    

}
