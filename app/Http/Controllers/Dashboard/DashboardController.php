<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function __construct()
	{
		$this->title = 'Dashboard';
	}

    public function mainAdmin() {
        $data['title'] = $this->title;
        return view('content.admin.dashboard.main', $data);
    }
    public function mainPetugas() {
        $data['title'] = $this->title;
        return view('content.petugas.dashboard.main', $data);
    }
    public function MainGuru() {
        $data['title'] = $this->title;
        return view('content.guru.dashboard.main', $data);
    }
}
