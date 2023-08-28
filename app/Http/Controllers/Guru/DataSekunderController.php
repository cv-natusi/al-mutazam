<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru\datasekunderguru;
use Illuminate\Http\Request;

class DataSekunderController extends Controller
{
    function __construct()
    {
        $this->title = 'Data Sekunder';
    }

    public function index()
    {
        $data['title'] = $this->title;
        $datasekunders = datasekunderguru::all();
        // return $dataprimers;
        return view('content.guru.data-sekunder.main', compact('datasekunders'), $data);
    }
}
