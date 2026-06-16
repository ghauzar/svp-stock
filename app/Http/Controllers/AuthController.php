<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $user = User::where(
            'username',
            $request->username
        )->first();

        if(!$user)
        {
            return back()
                ->with(
                    'error',
                    'Username tidak ditemukan'
                );
        }

        if(
            !Hash::check(
                $request->password,
                $user->password
            )
        )
        {
            return back()
                ->with(
                    'error',
                    'Password salah'
                );
        }

        session([
            'user_id' => $user->id,
            'username' => $user->username,
            'role' => $user->role
        ]);

        return redirect('/dashboard');
    }


    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}
