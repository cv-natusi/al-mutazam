<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataSekunderController extends Controller
{
    function __construct()
    {
        $this->title = 'Data Sekunder';
    }

    public function mainDataSekunder()
    {
        $data['title'] = $this->title;
        return view('content.guru.data-sekunder.main', $data);
    }
}
