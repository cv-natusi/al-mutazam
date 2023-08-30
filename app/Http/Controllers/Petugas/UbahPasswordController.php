<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UbahPasswordController extends Controller
{
    function __construct()
	{
		$this->title = 'Ubah Password';
	}

    public function ubahPassword() {
        $data['title'] = $this->title;
        return view('content.petugas.pengaturan.ubahpassword', $data);
    }
}
