<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\DataTugasPegawai;
use Illuminate\Http\Request;

class DataTugasPegawaiController extends Controller
{
    function __construct()
	{
		$this->title = 'Data Tugas Pegawai';
	}

    public function dataTugasPegawai() {
        $data['title'] = $this->title;
        $datatugaspegawai = DataTugasPegawai::all();
        return view('content.petugas.datatugaspegawai.main', compact('datatugaspegawai'), $data);
    }

    public function tambahTugasPegawai() {
        $data['title'] = $this->title;
        return view('content.petugas.datatugaspegawai.tambahtugas', $data);
    }
    
    public function editTugasPegawai() {
        $data['title'] = $this->title;
        return view('content.petugas.datatugaspegawai.updatetugas', $data);
    }
}
