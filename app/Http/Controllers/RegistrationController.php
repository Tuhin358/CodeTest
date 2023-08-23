<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function registration(){
        return view('home');
    }
    public function dashboard(){
        return view('admin.dashbord');
    }
    public function logout(){
        Session::flush();
        return redirect()->route('login');
    }
}
