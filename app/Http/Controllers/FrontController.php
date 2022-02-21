<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index()
    {
        return view('Front.pages.home');
    }

    public function admin_login(Request $request)
    {
        return view('Front.auth.admin-login');
    }

    public function userLogin(Request $request)
    {
        $check = $request->all();

        //  dd($check);

        if(Auth::attempt([
            'phone_number' => $check['phone_number'],
            'password' => $check['password']
        ]))
        {

            return redirect()->route('dashboard');

        }else{
            return back()->with('error', 'Invalid phone number or password');
        }
    }

    public function login(Request $request)
    {
        return view('Front.auth.login');
    }

    public function register(Request $request)
    {
        return view('Front.auth.register');
    }
}
