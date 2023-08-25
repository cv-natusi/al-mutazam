<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaturanGuruController extends Controller
{
    function __construct()
    {
        $this->title = 'Pengaturan';
    }

    public function mainPengaturanGuru()
    {
        $data['title'] = $this->title;
        return view('content.guru.pengaturan.main', $data);
    }
}
