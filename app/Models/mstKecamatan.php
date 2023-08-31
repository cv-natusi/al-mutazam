<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\mstProvinsi;
use App\Models\mstKabupaten;
use App\Models\mstDesa;

class mstKecamatan extends Model{
	use HasFactory;
	public $keyType = 'string';

	public function provinsi(){
		return $this->belongsTo(mstProvinsi::class,'provinsi_id','id');
	}
	public function kabupaten(){
		return $this->belongsTo(mstKabupaten::class,'kabupaten_id','id');
	}
	public function desa(){
		return $this->hasMany(mstDesa::class,'kecamatan_id','id');
	}


	/**
	 * Syntax of Accessors : get{Attribute}Attribute
	 * modify data sebelum ditampilkan ke client
	 */
	public static function getProvinsiIdAttribute($value){ # Accessor start
		return (int)$value;
	}
	public static function getKabupatenIdAttribute($value){
		return (int)$value;
	}
	public static function getIdAttribute($value){
		return (int)$value;
	} # Accessor end


	public static function filterKecamatan($param){
		return mstKecamatan::select('id','nama','provinsi_id','kabupaten_id')->where('kabupaten_id',$param)->get();
	}
}
