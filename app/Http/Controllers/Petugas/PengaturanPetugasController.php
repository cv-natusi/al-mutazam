<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaturanPetugasController extends Controller
{
    function __construct()
    {
        $this->title = 'Pengaturan Petugas';
    }

    public function mainPengaturanPetugas()
    {
        $data['title'] = $this->title;
        return view('content.petugas.pengaturan.ubah-password', $data);
    }

    public function mainResetPetugas()
    {
        $data['title'] = $this->title;
        return view('content.petugas.pengaturan.reset-password', $data);
    }
}
