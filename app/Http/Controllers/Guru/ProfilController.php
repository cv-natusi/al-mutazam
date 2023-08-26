<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    function __construct()
    {
        $this->title = 'Profil Guru';
    }

    public function mainProfil()
    {
        $data['title'] = $this->title;
        return view('content.guru.profil.profil', $data);
    }
    public function editProfil()
    {
        $data['title'] = $this->title;
        return view('content.guru.profil.edit-profil', $data);
    }
}
