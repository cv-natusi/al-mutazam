<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\mstProvinsi;
use App\Models\mstKecamatan;
use App\Models\mstDesa;

class mstKabupaten extends Model{
	use HasFactory;
	public $keyType = 'string';

	public function provinsi(){
		return $this->belongsTo(mstProvinsi::class,'provinsi_id','id');
	}
	public function kecamatan(){
		return $this->hasMany(mstKecamatan::class,'kabupaten_id','id');
	}
	public function desa(){
		return $this->hasMany(mstDesa::class,'kabupaten_id','id');
	}


	/**
	 * Syntax of Accessors : get{Attribute or custom AttributeName for multiple Attr}Attribute
	 * Syntax multiple attributes : $this->attributes['id'] = (int)$this->id
	 * modify data sebelum ditampilkan ke client
	 */
	public static function getIdAttribute($value):int{ # Accessor start
		return (int)$value;
	}
	public static function getProvinsiIdAttribute($value):int{
		return (int)$value;
	} # Accessor end


	public static function filterKabupaten($param){
		return mstKabupaten::select('id','nama','provinsi_id')->where('provinsi_id',$param)->get();
	}
}
