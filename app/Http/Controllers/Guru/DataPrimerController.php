<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataPrimerController extends Controller
{
    function __construct()
    {
        $this->title = 'Data Primer';
    }

    public function mainDataPrimer()
    {
        $data['title'] = $this->title;
        return view('content.guru.data-primer.main', $data);
    }
}
