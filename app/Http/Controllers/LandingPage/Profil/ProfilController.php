<?php

namespace App\Http\Controllers\LandingPage\Profil;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\identity;
use DB;

class ProfilController extends Controller
{
    public function sejarah() {
        $identity = Identity::find(1);
        return view('content.landing-page.profil.sejarah', compact('identity'));
    }
    public function visimisi() {
        $identity = Identity::find(1);
        return view('content.landing-page.profil.visimisi', compact('identity'));
    }
    public function sambutan() {
        $identity = Identity::find(1);
        return view('content.landing-page.profil.sambutan', compact('identity'));
    }
    public function struktur() {
        $identity = Identity::find(1);
        return view('content.landing-page.profil.struktur', compact('identity'));
    }
    public function struktural() {
        $guru = Guru::orderBy('id_guru')->limit(12)->get();
        return view('content.landing-page.profil.struktural', compact('guru'));
    }
    public function fasilitas() {
        $fasilitas = DB::table('exkul')->where('status_exkul','1')->where('type_exkul',2)->orderBy('id_exkul','DESC')->limit('9')->get();
        return view('content.landing-page.profil.fasilitas', compact('fasilitas'));
    }
}
