<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::attempt($infologin)) {
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
}
