<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPelajaranController extends Controller
{
    function __construct()
	{
		$this->title = 'Data Pelajaran';
	}

    public function dataPelajaran() {
        $data['title'] = $this->title;
        return view('content.petugas.datapelajaran.main', $data);
    }
}
