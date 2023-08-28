<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;

class ProfilController extends Controller
{
    function __construct()
    {
        $this->title = 'Profil Guru';
    }

    public function mainProfil()
    {
        $guru = Users::Join('guru', 'guru.id_users', '=', 'users.id')
            ->orderBy('id', 'asc')->get();
        // return response()->json([
        //     'guru' => $guru
        // ]);
        $data['title'] = $this->title;
        return view('content.guru.profil.profil')->with('guru', $guru)->with($data);
    }
    public function editProfil()
    {
        $data['title'] = $this->title;
        return view('content.guru.profil.edit-profil', $data);
    }
}
