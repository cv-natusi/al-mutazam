<?php

namespace App\Http\Controllers\LandingPage\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Helpers\Helpers;

use App\Models\Berita;

class HomeController extends Controller{
	public function main(Request $request){
		$berita = Berita::getBeritaLimit(3);
		$event = Berita::getEventLimit(3);
		$pengumuman = Berita::getPengumumanLimit(6);
		return view('content.landing-page.home.main',compact('berita','event','pengumuman'));
	}
	public function berita(Request $request){
		if($request->ajax()){
			$payload = [
				'code' => 204,
				'message' => 'Data tidak ditemukan',
			];
			if($event = Berita::filterBeritaById($request)){
				$payload['code'] = 200;
				$payload['message'] = 'Ok';
				$payload['response'] = $event;
			}
			return Helpers::resAjax($payload);
		}
		$berita = Berita::getBeritaPaginate();
		return view('content.landing-page.home.berita',compact('berita'));
	}
	public function event(Request $request){
		if($request->ajax()){
			$payload = [
				'code' => 204,
				'message' => 'Data tidak ditemukan',
			];
			if($event = Berita::filterEventById($request)){
				$payload['code'] = 200;
				$payload['message'] = 'Ok';
				$payload['response'] = $event;
			}
			return Helpers::resAjax($payload);
		}
		$event = Berita::getEventPaginate();
		return view('content.landing-page.home.event',compact('event'));
	}
	public function pengumuman(Request $request){
		return view('content.landing-page.home.pengumuman');
	}
	public function ekskul(Request $request){
		return view('content.landing-page.program.ekskul');
	}
	public function programUnggulan(Request $request){
		return view('content.landing-page.program.program-unggulan');
	}
	public function prestasiSiswa(Request $request){
		return view('content.landing-page.program.prestasi-siswa');
	}
	public function galeri(Request $request){
		return view('content.landing-page.galeri.galeri');
	}
	public function uks(Request $request){
		return view('content.landing-page.program.uks');
	}
}
