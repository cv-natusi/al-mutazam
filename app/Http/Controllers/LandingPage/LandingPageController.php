<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LandingPageController extends Controller{
	public function index(Request $request){
		return view("landing-page.index");
	}
}
