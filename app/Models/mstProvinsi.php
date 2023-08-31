<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\mstKabupaten;
use App\Models\mstKecamatan;
use App\Models\mstDesa;

class mstProvinsi extends Model{
	use HasFactory;
	public $keyType = 'string';
	protected $guard = [];

	public function kabupaten(){
		return $this->hasMany(mstKabupaten::class,'provinsi_id','id');
	}
	public function kecamatan(){
		return $this->hasMany(mstKecamatan::class,'provinsi_id','id');
	}
	public function desa(){
		return $this->hasMany(mstDesa::class,'provinsi_id','id');
	}

    
	/**
	 * Syntax of Accessors : get{Attribute}Attribute
	 * modify data sebelum ditampilkan ke client
	 */
	public static function getIdAttribute($value){ # Accessor start
		return (int)$value; # Returns id attribute to int
	} # Accessor end


	public static function getAll(){
		return mstProvinsi::select('id','nama')->get();
	}
}
