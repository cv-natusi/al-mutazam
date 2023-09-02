<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller{
	public function mainAdmin() {
		$data['title'] = 'Dashboard';
		return view('content.admin.dashboard.main', $data);
	}
	public function getDashboard() {
		$getBeritaSekolah = DB::table('berita')->where('kategori','1')->count();
		$getEvent = DB::table('berita')->where('kategori','2')->count();
		$getPengumuman = DB::table('berita')->where('kategori','3')->count();
		$data['beritaSekolah'] = $getBeritaSekolah>0?$getBeritaSekolah:'0';
		$data['event'] = $getEvent>0?$getEvent:'0';
		$data['pengumuman'] = $getPengumuman>0?$getPengumuman:'0';
		return $data;
	}
	public function mainPetugas() {
		$data['title'] = 'Dashboard Petugas';
		return view('content.petugas.dashboard.main', $data);
	}
	public function MainGuru() {
		$data['title'] = 'Dasboard Guru';
		return view('content.guru.dashboard.main', $data);
	}
}
