<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        if ($user = Auth::user()) {
            if ($user->level == '1') {
                return redirect()->route('dashboardAdmin');
            } else if($user->level == '2') {
                return redirect()->route('dashboardPetugas');
            } else if($user->level == '3') {
                return redirect()->route('dashboardGuru');
            }
        }
        return view('content.login.index');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]);

        $kredensil = $request->only('email','password');
            if (Auth::attempt($kredensil)) {
                $user = Auth::user();
                if ($user->level == '1') {
                    return redirect()->route('dashboardAdmin');
                } else if($user->level == '2') {
                    return redirect()->route('dashboardPetugas');
                } else if($user->level == '3') {
                    return redirect()->route('dashboardGuru');
                }
                return redirect()->route('/');
            }

        return redirect()->route('login')
        ->withInput()
        ->withErrors(['login_gagal' => 'Username atau Password salah.']);
    }

    public function logout(Request $request)
    {
       $request->session()->flush();
       Auth::logout();
       return Redirect()->route('login');
    }
}
