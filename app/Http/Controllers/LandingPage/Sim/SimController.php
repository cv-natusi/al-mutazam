<?php

namespace App\Http\Controllers\LandingPage\Sim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SimController extends Controller
{
    public function main(){
		return view('content.landing-page.sim.main');
    }
}
