<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    function showLogin()
    {
        // Form View
        return view('auth/login');
    }

    function checklogin(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);
        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );
        if (Auth::attempt($user_data)) {
            return redirect('/');
        }
        return back()->with('error', 'Number or password entered incorrectly')->withSuccess('Oppes! You have entered invalid credentials');
    }


    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
