<?php

namespace App\Http\Controllers\LandingPage\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Berita;

class HomeController extends Controller{
	public function main(Request $request){
		return view('content.landing-page.home.main');
	}
	public function berita(Request $request){
		$berita = Berita::getBeritaPaginate();
		return view('content.landing-page.home.berita',compact('berita'));
	}
	public function event(Request $request){
		return view('content.landing-page.home.event');
	}
	public function pengumuman(Request $request){
		return view('content.landing-page.home.pengumuman');
	}
}
