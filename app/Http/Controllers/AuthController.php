<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'email' => ['required','email','string','unique:users', Rule::notIn('email@hack.net')],
            'password' => ['required','string','min:8'],
            'name' => ['required','string']
        ]);

        $remember = $request->filled('remember');

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::login($user, $remember);
        return redirect()->intended('home')->with('status','You are logged in');
    }

    public function login(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email','string'],
            'password' => ['required','string']
        ]);
        $remember = $request->filled('remember');

        if(Auth::attempt($data, $remember)){
            $request->session()->regenerate();
            return redirect()
                ->intended('home')
                ->with('status','You are logged in');
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed')
        ]);
    }

    public function logout(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
