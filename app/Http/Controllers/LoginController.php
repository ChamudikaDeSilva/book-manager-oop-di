<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
   public function showLoginForm()
   {
        return view('auth.login');
   }

   public function login(Request $request)
   {
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        $user=User::where('email',$credentials['email'])->first();

        if($user && Hash::check($credentials['password'],$user->password))
        {
            Auth::login($user);

            return redirect()->route('dashboard');
        }
        return back()->withErrors([
            'email'=>'Invalid Credentials.'])
            ->withInput();
   }

   public function logout(Request $request)
   {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form');
   }
}
