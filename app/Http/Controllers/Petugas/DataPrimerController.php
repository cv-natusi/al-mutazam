<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPrimerController extends Controller
{
    function __construct()
	{
		$this->title = 'Data Primer';
	}

    public function dataPrimer() {
        $data['title'] = $this->title;
        return view('content.petugas.bankdata.dataPrimer', $data);
    }
}
