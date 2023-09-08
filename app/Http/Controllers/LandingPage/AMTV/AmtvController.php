<?php

namespace App\Http\Controllers\LandingPage\AMTV;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Identity;
use App\Models\Amtv;
use DB;

class AmtvController extends Controller
{
    public function main(Request $request)
    {
        $amtvs = DB::table('amtv')->where('status_amtv', '1')->orderBy('id_amtv', 'DESC')->limit('9')->get();
        // return view('content.landing-page.amtv.main', compact('amtvs'));

        if ($request->ajax()) {
            $payload = [
                'code' => 204,
                'message' => 'Data tidak ditemukan',
            ];
            if ($amtvs = Amtv::filterAmtvById($request)) {
                $payload['code'] = 200;
                $payload['message'] = 'Ok';
                $payload['response'] = $amtvs;
            }
            return Helpers::resAjax($payload);
        }
        $amtvs = Amtv::getAmtvPaginate();
        return view('content.landing-page.amtv.main', compact('amtvs'));
    }



    // public function amtv(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $payload = [
    //             'code' => 204,
    //             'message' => 'Data tidak ditemukan',
    //         ];
    //         if ($amtvs = Amtv::filterAmtvById($request)) {
    //             $payload['code'] = 200;
    //             $payload['message'] = 'Ok';
    //             $payload['response'] = $amtvs;
    //         }
    //         return Helpers::resAjax($payload);
    //     }
    //     $amtv = Amtv::getAmtvPaginate();
    //     return view('content.landing-page.amtv.main', compact('amtv'));
    // }
}
