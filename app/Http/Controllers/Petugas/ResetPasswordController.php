<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    function __construct()
	{
		$this->title = 'Reset Password';
	}

    public function resetPassword() {
        $data['title'] = $this->title;
        return view('content.petugas.pengaturan.resetpassword', $data);
    }
}
