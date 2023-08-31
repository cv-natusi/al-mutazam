<?php

namespace App\Http\Controllers\mstWilayah;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\mstProvinsi;
use App\Models\mstKabupaten;
use App\Models\mstKecamatan;
use App\Models\mstDesa;

use App\Helpers\ptcn; # Helper
use Illuminate\Support\Facades\Redis;

class mstWilayahController extends Controller{
	public function resData($param){
		if(count($param)>0){
			return ['success'=>true,'code'=>200,'message'=>'Data found','data'=>$param];
		}else{
			return ['success'=>false,'code'=>400,'message'=>'Data not found','data'=>[]];
		}
	}
	public function getProv(Request $request){
        $keys = 'wilayah:provinsi'; # "namespce:key"
        if(!$dataProv = json_decode(Redis::get($keys),true)){ # Get cache in redis, if no fetch from database then create new cache
            $dataProv = mstProvinsi::all();
            ptcn::setRedis(['keys'=>$keys,'ttl'=>180,'data'=>$dataProv]); # Store data to redis, ttl{time to live} in minutes
        }
		return $this->resData($dataProv);
	}
	public function getKab(Request $request){
        $id = $request->provinsiId;
        $keys = "wilayah:kabupaten:$id"; # "namespce:key:id_provinsi"
        if(!$dataKab = json_decode(Redis::get($keys),true)){
            $dataKab = mstKabupaten::filterKabupaten($id);
            ptcn::setRedis(['keys'=>$keys,'ttl'=>180,'data'=>$dataKab]);
        }
		return $this->resData($dataKab);
	}
	public function getKec(Request $request){
        $id = $request->kabupatenId;
        $keys = "wilayah:kecamatan:$id"; # "namespce:key:id_kabupaten"
        if(!$dataKec = json_decode(Redis::get($keys),true)){
            $dataKec = mstKecamatan::filterKecamatan($id);
            ptcn::setRedis(['keys'=>$keys,'ttl'=>180,'data'=>$dataKec]);
        }
		return $this->resData($dataKec);
	}
	public function getDesa(Request $request){
        $id = $request->kecamatanId;
        $keys = "wilayah:desa:$id"; # "namespce:key:id_kecamatan"
        if(!$dataDesa = json_decode(Redis::get($keys),true)){
            $dataDesa = mstDesa::filterDesa($id);
            ptcn::setRedis(['keys'=>$keys,'ttl'=>180,'data'=>$dataDesa]);
        }
		return $this->resData($dataDesa);
	}
}
