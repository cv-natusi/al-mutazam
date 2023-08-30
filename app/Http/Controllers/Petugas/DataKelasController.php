<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\DataKelas;
use Illuminate\Http\Request;

class DataKelasController extends Controller
{
    function __construct()
	{
		$this->title = 'Data Kelas';
	}

    public function dataKelas() {
        $data['title'] = $this->title;
        $datakelas = DataKelas::all();
        return view('content.petugas.datakelas.main', compact('datakelas'), $data);
    }

    public function tambahDataKelas() {
        $data['title'] = $this->title;
        return view('content.petugas.datakelas.tambahkelas', $data);
    }

    public function editDataKelas() {
        $data['title'] = $this->title;
        return view('content.petugas.datakelas.updatekelas', $data);
    }

}
