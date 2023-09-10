<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amtv extends Model{
	use HasFactory;
	protected $table = 'amtv';
	protected $fillable = ['id_amtv', 'judul_amtv', 'file', 'status_amtv'];
	protected $primaryKey = "id_amtv";
	public $timestamps = false;
	
	public static function getAmtvPaginate(){
		return Amtv::where('status_amtv', 1)->orderBy('id_amtv', 'DESC')->paginate(9);
	}
}
