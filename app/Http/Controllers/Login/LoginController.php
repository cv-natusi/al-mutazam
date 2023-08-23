<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if(!empty($this->data['user'])){
            return redirect()->route('home');
        }
        $this->data['next_url']     = empty($request->next_url) ? '' : $request->next_url;
        return view('Admin.master.login')->with('data', $this->data);
    }
}
