<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index (){
        return view('home');
    }

    public function superadmin()
    {
        return view('home');
    }

    public function admin()
    {
        return view('home');
    }

    public function member()
    {
        return view('home');
    }
}
