<?php

namespace App\Http\Controllers\mstWilayah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Desa;
use File, Auth, Redirect, Validator, URL, DB, Excel;

class mstWilayahController extends Controller{
	function getKabupaten(Request $request){
        $id_provinsi = $request->id;
        $kabupaten = Kabupaten::where('provinsi_id',$id_provinsi)->get();
        
        if(count($kabupaten)!=0){
            $return = [
            'status'=>'success',
            'message'=>'Data ditemukan',
            'data'=>$kabupaten,
            ];
        }else{
            $return = [
            'status'=>'error',
            'message'=>'Data tidak ditemukan',
            'data'=>[],
            ];
        }
        return $return;
    }

    function getKecamatan(Request $request){
        $id_kabupaten = $request->id;
        $kecamatan = Kecamatan::where('kabupaten_id',$id_kabupaten)->get();

        if(count($kecamatan)!=0){
            $return = [
            'status'=>'success',
            'message'=>'Data ditemukan',
            'data'=>$kecamatan,
            ];
        }else{
            $return = [
            'status'=>'error',
            'message'=>'Data tidak ditemukan',
            'data'=>[],
            ];
        }
        return $return;
    }

    function getDesa(Request $request){
        $id_kecamatan = $request->id;
        $desa = Desa::where('kecamatan_id',$id_kecamatan)->get();

        if(count($desa)!=0){
            $return = [
            'status'=>'success',
            'message'=>'Data ditemukan',
            'data'=>$desa,
            ];
        }else{
            $return = [
            'status'=>'error',
            'message'=>'Data tidak ditemukan',
            'data'=>[],
            ];
        }
        return $return;
    }
}
