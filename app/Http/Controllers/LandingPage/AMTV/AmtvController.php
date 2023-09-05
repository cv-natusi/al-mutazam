<?php

namespace App\Http\Controllers\LandingPage\AMTV;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Identity;
use DB;

class AmtvController extends Controller
{
    public function main() {
        $amtvs = DB::table('amtv')->where('status_amtv','1')->orderBy('id_amtv','DESC')->limit('9')->get();
        return view('content.landing-page.amtv.main', compact('amtvs'));
    }
}
