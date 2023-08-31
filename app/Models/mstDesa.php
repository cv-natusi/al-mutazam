<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\mstProvinsi;
use App\Models\mstKabupaten;
use App\Models\mstKecamatan;

class mstDesa extends Model{
	use HasFactory;
	public $keyType = 'string';

	public function provinsi(){
		return $this->belongsTo(mstProvinsi::class,'provinsi_id','id');
	}
	public function kabupaten(){
		return $this->belongsTo(mstKabupaten::class,'kabupaten_id','id');
	}
	public function kecamatan(){
		return $this->belongsTo(mstKecamatan::class,'kecamatan_id','id');
	}
	public static function filterDesa($param){
		return mstDesa::where('kecamatan_id',$param)->get();
	}
}
