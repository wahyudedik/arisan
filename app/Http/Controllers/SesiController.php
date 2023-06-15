<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class SesiController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email Wajib Diisi',
                'password.required' => 'Password Wajib Diisi'
            ],

        );

        $infologin = [
            'email'=>$request->email,
            'password'=>$request->password
        ];

        $remember = $request->has('remember'); //Check if "Remember Me" checkbox is checked

        if (Auth::attempt($infologin, $remember)) {
            if (Auth::user()->role === 'superadmin') {
                return redirect('superadmin');
            } else if (Auth::user()->role === 'admin') {
                return redirect('admin');
            } else if (Auth::user()->role === 'member') {
                return redirect('member');
            }
        }else{
            return redirect('')->withErrors('Email Atau Password Salah')->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function registerForm (){
        return view('register');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);

        // Redirect to the appropriate page after registration
        return redirect('/')->with('success', 'Registration successful. Please login.');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? redirect()->back()->with('status', __($status))
            : redirect()->back()->withErrors(['email' => __($status)]);
    }

    public function showLinkRequestForm()
    {
        return view('email');
    }

    public function showResetForm($token)
    {
        return view('reset')->with(['token' => $token, 'email' => request()->query('email')]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : redirect()->back()->withErrors(['email' => __($status)]);
    }

}
