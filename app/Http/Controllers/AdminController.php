<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function createAdmin(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'usertype' => 'required',
            'password' => 'required|string|confirmed|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'password_confirmation' => 'required|string',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->usertype = $request->input('usertype');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        
        return view('success')->with('adminData', $user);


    }

    public function AuthAdmin(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();
        
        if ($user && Hash::check($password, $user->password)) {
            $request->session()->put('user_id', $user->id);
            return redirect()->route('candSession');
        }
         return redirect()->route('loginAdmin')->withErrors("Incorrect Login Credentials!");

    }
}
