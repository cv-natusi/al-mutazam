<?php

namespace App\Http\Controllers\LandingPage\Sim;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BerbagiDokumen;
use DB;

class SimController extends Controller
{
    public function main(){
      $dokumen = BerbagiDokumen::getDokumenLimit(6);
      return view('content.landing-page.sim.main', compact('dokumen'));
    }
}
