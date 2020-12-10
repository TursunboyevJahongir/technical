<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('auth/register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password'  => ['required','confirmed', 'min:3'],
        ]);
        $all = $request->all();
        $all['password'] = bcrypt($all['password']);
        $user = User::create($all);
        return redirect('/');
    }
}
