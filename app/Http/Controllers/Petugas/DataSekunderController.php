<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataSekunderController extends Controller
{
    function __construct()
	{
		$this->title = 'Data Sekunder';
	}

    public function dataSekunder() {
        $data['title'] = $this->title;
        return view('content.petugas.bankdata.dataSekunder', $data);
    }
}
