<?php

namespace App\Http\Controllers\LandingPage\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\Helpers;
use App\Models\Identity;
use App\Models\Berita;
use App\Models\Exkul;
use App\Models\Galeri;
use App\Models\BerbagiDokumen;
use DB, Storage;

class HomeController extends Controller
{
	public function main(Request $request)
	{
		if ($request->ajax()) {
			$payload = [
				'code' => 204,
				'message' => 'Data tidak ditemukan',
			];
			if ($event = Berita::filerAgendaById($request)) {
				$payload['code'] = 200;
				$payload['message'] = 'Ok';
				$payload['response'] = $event;
			}
			return Helpers::resAjax($payload);
		}
		$berita = Berita::getBeritaLimit(3);
		$event = Berita::getEventLimit(3);
		$pengumuman = Berita::getPengumumanLimit(6);
		$dokumen = BerbagiDokumen::getDokumenLimit(6);
		$slider = DB::table('slider')->get();
		$beritaSlider = Berita::where('kategori', 1)->orderBy('tanggal', 'ASC')->limit(3)->get();
		// $agendas = DB::table('berita')->where('status', '1')->where('tanggal_acara', '>=', date('Y-m-d'))->where('kategori', '2')->orderBy('tanggal_acara', 'ASC')->limit(10)->get();
		$agendas = DB::table('berita')->where('status', '1')->where('kategori', '2')->orderBy('tanggal_acara', 'ASC')->limit(10)->get();
		return view('content.landing-page.home.main', compact('berita', 'event', 'pengumuman', 'slider', 'beritaSlider', 'agendas', 'dokumen'));
	}
	public function berita(Request $request)
	{
		if ($request->ajax()) {
			$payload = [
				'code' => 204,
				'message' => 'Data tidak ditemukan',
			];
			if ($event = Berita::filterBeritaById($request)) {
				$payload['code'] = 200;
				$payload['message'] = 'Ok';
				$payload['response'] = $event;
			}
			return Helpers::resAjax($payload);
		}
		$berita = Berita::getBeritaPaginate();
		return view('content.landing-page.home.berita', compact('berita'));
	}
	public function event(Request $request)
	{
		if ($request->ajax()) {
			$payload = [
				'code' => 204,
				'message' => 'Data tidak ditemukan',
			];
			if ($event = Berita::filterEventById($request)) {
				$payload['code'] = 200;
				$payload['message'] = 'Ok';
				$payload['response'] = $event;
			}
			return Helpers::resAjax($payload);
		}
		$event = Berita::getEventPaginate();
		return view('content.landing-page.home.event', compact('event'));
	}
	public function pengumuman(Request $request)
	{
		$pengumuman = Berita::getPengumumanLimit(5);
		if ($request->ajax()) {
			$payload = [
				'code' => 204,
				'message' => 'Data tidak ditemukan',
			];
			if ($event = Berita::filterPengumumanById($request)) {
				$payload['code'] = 200;
				$payload['message'] = 'Ok';
				$payload['response'] = $event;
			}
			return Helpers::resAjax($payload);
		}
		$pengumuman = Berita::getPengumumanPaginate();
		return view('content.landing-page.home.pengumuman', compact('pengumuman'));
	}
	public function dokumen(Request $request)
	{
		$dokumen = BerbagiDokumen::getDokumenPaginate();
		$amtvs = DB::table('amtv')->where('status_amtv', '1')->orderBy('id_amtv', 'DESC')->limit('5')->get();
		return view('content.landing-page.home.dokumen', compact('dokumen','amtvs'));
	}
	public function doLogin(Request $request) {
		request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]
        );
        $kredensil = $request->only('email', 'password');
        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user) {
                return ['code'=>'200','status'=>'success','message'=>'berhasil'];
            } else {
				return ['code'=>'201','status'=>'error','message'=>'gagal'];
			}
        }

        return redirect()->route('home.main');
	}
	public function downloadPdf($filename)
    {
		$path = storage_path("app/public/uploads/berbagiDokumen/{$filename}");
		if (file_exists($path)) {
			return response()->download($path, $filename, [
				'Content-Type' => 'application/pdf',
			]);
		} else {
			abort(404, 'File not found');
		}
    }
	public function ekskul(Request $request)
	{
		$amtvs = DB::table('amtv')->where('status_amtv', '1')->orderBy('id_amtv', 'DESC')->limit('3')->get();
		if ($request->ajax()) {
			$payload = [
				'code' => 204,
				'message' => 'Data tidak ditemukan',
			];
			if ($ekskul = Exkul::filterExkulById($request)) {
				$payload['code'] = 200;
				$payload['message'] = 'Ok';
				$payload['response'] = $ekskul;
			}
			return Helpers::resAjax($payload);
		}
		$ekskul = Exkul::getExkulPaginate();
		return view('content.landing-page.program.ekskul', compact('ekskul', 'amtvs'));
	}
	public function programUnggulan(Request $request)
	{
		// $beritas = DB::table('berita')->where('kategori', '5')->where('status', '1')->limit('10')->orderBy('id_berita', 'DESC')->get();
		if ($request->ajax()) {
			$payload = [
				'code' => 204,
				'message' => 'Data tidak ditemukan',
			];
			if ($beritas = Berita::filterUnggulanById($request)) {
				$payload['code'] = 200;
				$payload['message'] = 'Ok';
				$payload['response'] = $beritas;
			}
			return Helpers::resAjax($payload);
		}
		$beritas = Berita::getUnggulanPaginate();
		return view('content.landing-page.program.program-unggulan', compact('beritas'));
	}
	public function prestasiSiswa(Request $request)
	{
		$beritas1 = DB::table('berita')->where('kategori', '4')->where('status', '1')->orderBy('id_berita', 'DESC')->take(5)->get();
		$lastBeritas1 = $beritas1->last()->id_berita;
		$beritas2 = DB::table('berita')->where('kategori', '4')->where('status', '1')->where('id_berita', '<', $lastBeritas1)->orderBy('id_berita', 'DESC')->take(5)->get();

		if ($request->ajax()) {
			$payload = [
				'code' => 204,
				'message' => 'Data tidak ditemukan',
			];
			if ($berita = Berita::filterPrestasiById($request)) {
				$payload['code'] = 200;
				$payload['message'] = 'Ok';
				$payload['response'] = $berita;
			}
			return Helpers::resAjax($payload);
		}
		$berita = Berita::getPrestasiPaginate();
		return view('content.landing-page.program.prestasi-siswa', compact('beritas1', 'beritas2', 'berita'));
	}
	public function galeri(Request $request)
	{
		// $galeries = DB::table('galeri')->where('status_galeri', '1')->orderBy('id_galeri', 'DESC')->limit('9')->get();
		// return view('content.landing-page.galeri.galeri', compact('galeries'));

		if ($request->ajax()) {
			$payload = [
				'code' => 204,
				'message' => 'Data tidak ditemukan',
			];
			if ($galeries = Galeri::filterGaleriById($request)) {
				$payload['code'] = 200;
				$payload['message'] = 'Ok';
				$payload['response'] = $galeries;
			}
			return Helpers::resAjax($payload);
		}
		$galeries = Galeri::getGaleriesPaginate();
		return view('content.landing-page.galeri.galeri', compact('galeries'));
	}
	public function uks(Request $request)
	{
		$dokumen = BerbagiDokumen::getDokumenLimit(6);
        // return view('content.landing-page.profil.sambutan', compact('identity','amtvs','dokumen'));
		return view('content.landing-page.program.uks', compact('dokumen'));
	}
}
