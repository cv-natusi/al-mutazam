<?php

namespace App\Http\Controllers\LandingPage\Profil;

use App\Http\Controllers\Controller;
use App\Models\Exkul;
use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\identity;
use DB;

class ProfilController extends Controller
{
    public function sejarah()
    {
        $identity = Identity::find(1);
        return view('content.landing-page.profil.sejarah', compact('identity'));
    }
    public function visimisi()
    {
        $identity = Identity::find(1);
        return view('content.landing-page.profil.visimisi', compact('identity'));
    }
    public function sambutan()
    {
        $identity = Identity::find(1);
        return view('content.landing-page.profil.sambutan', compact('identity'));
    }
    public function struktur()
    {
        $identity = Identity::find(1);
        return view('content.landing-page.profil.struktur', compact('identity'));
    }
    public function struktural()
    {
        $guru = Guru::orderBy('id_guru')->limit(12)->get();
        return view('content.landing-page.profil.struktural', compact('guru'));
    }
    public function fasilitas(Request $request)
    {
        $fasilitas = Exkul::where('status_exkul', '1')->where('type_exkul', 2)->orderBy('id_exkul', 'DESC')->limit('9')->get();
        if ($request->ajax()) {
            $payload = [
                'code' => 204,
                'message' => 'Data tidak ditemukan',
            ];
            if ($event = Exkul::filterFasilitasById($request)) {
                $payload['code'] = 200;
                $payload['message'] = 'Ok';
                $payload['response'] = $fasilitas;
            }
            return Helpers::resAjax($payload);
        }
        $fasilitas = Exkul::getFasilitasPaginate();
        return view('content.landing-page.profil.fasilitas', compact('fasilitas'));
    }
}
