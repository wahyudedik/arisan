<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index (){
        if (Auth::user()->role == 'superadmin') {
            return view('superadmin.dashboard');
        } elseif (Auth::user()->role == 'admin') {
            return view('admin.dashboard');
        } elseif (Auth::user()->role == 'member') {
            return view('member.dashboard');
        }
    }

    // public function superadmin()
    // {
    //     return view('home');
    // }

    // public function admin()
    // {
    //     return view('home');
    // }

    // public function member()
    // {
    //     return view('home');
    // }
}
