<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller{
	public function home(Request $request){
		return view('content.landing-page.home');
	}
}
