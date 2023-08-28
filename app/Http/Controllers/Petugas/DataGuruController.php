<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Petugas\DataGuru;
use App\Models\Petugas\DataPrimerGuru;
use App\Models\Petugas\DataSekunderGuru;
use Illuminate\Http\Request;

class DataGuruController extends Controller
{
    function __construct()
	{
		$this->title = 'Data Guru';
	}

    public function dataGuru() {
        $data['title'] = $this->title;
        $dataguru = DataGuru::all();
        return view('content.petugas.dataguru.main', compact('dataguru'), $data);
    }
    
    public function tambahGuru() {
        $data['title'] = $this->title;
        return view('content.petugas.dataguru.tambahguru', $data);
    }
    
    public function editGuru() {
        $data['title'] = $this->title;
        return view('content.petugas.dataguru.updateguru', $data);
    }

    public function detailGuru() {
        $data['title'] = $this->title;
        $guru = DataGuru::all();
        return view('content.petugas.dataguru.detail', compact('guru'), $data);
    }

    public function primerGuru() {
        $data['title'] = $this->title;
        $guru = DataGuru::all();
        $primerguru = DataPrimerGuru::all();
        return view('content.petugas.dataguru.dataprimer', compact('primerguru','guru'), $data);
    }

    public function sekunderGuru() {
        $data['title'] = $this->title;
        $guru = DataGuru::all();
        $sekunderguru = DataSekunderGuru::all();
        return view('content.petugas.dataguru.datasekunder', compact('sekunderguru','guru'), $data);
    }
    
}
