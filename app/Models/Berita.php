<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Helpers\Helpers;

class Berita extends Model{
	use HasFactory;
	protected $table = 'berita';

	/**
	 * Syntax of Accessors : get{Attribute or custom AttributeName for multiple Attr}Attribute
	 * Syntax for multiple attributes : $this->attributes['id'] = (int)$this->id
	 * modify data sebelum ditampilkan ke client
	 */
	# Accessor start
	public static function getDateIndoAttribute($value){
		return Helpers::dateIndo($value);
	}


	public static function getBeritaPaginate(){
		return Berita::select('*','tanggal as date_indo')->where('kategori',1)->orderBy('tanggal','DESC')->paginate(4);
	}
	public static function getEventPaginate(){
		return Berita::select('*','tanggal as date_indo')->where('kategori',2)->orderBy('tanggal','DESC')->paginate(4);
	}
	public static function getBeritaLimit($number){
		return Berita::where('kategori',1)->orderBy('tanggal','DESC')->limit($number)->get();
	}
	public static function getEventLimit($number){
		return Berita::where('kategori',2)->orderBy('tanggal','DESC')->limit($number)->get();
	}
	public static function getPengumumanLimit($number){
		return Berita::where('kategori',3)->orderBy('tanggal','DESC')->limit($number)->get();
	}
	public static function filterBeritaById($params){
		return Berita::where([
			['kategori',1],
			['id_berita',$params->id]
		])->first();
	}
	public static function filterEventById($params){
		return Berita::where([
			['kategori',2],
			['id_berita',$params->id]
		])->first();
	}
}
