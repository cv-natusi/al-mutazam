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
}
