<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;
use Sentinel;
use App\Helpers\Helpers;

class Berita extends Model{
	use HasFactory;
	protected $table = 'berita';
	protected $fillable = ['id_berita', 'menu_id', 'editor_id', 'judul', 'isi', 'gambar', 'jam', 'tanggal', 'dibaca', 'status', 'kategori'];
	protected $primaryKey = "id_berita";
	public $timestamps = false;
	
	public static function getBeritaSekolah($input){
		$table  = 'berita';
		$select = '*';
		
		$replace_field  = [
			// ['old_name' => 'statu', 'new_name' => 'status'],
			// ['old_name' => 'terbit', 'new_name' => 'tanggal'],
			// ['old_name' => 'terbit', 'new_name' => 'jam'],
		];
		
		$param = [
			'input'         => $input->all(),
			'select'        => $select,
			'table'         => $table,
			'replace_field' => $replace_field
		];
		$datagrid = new Datagrid;
		$data = $datagrid->datagrid_query($param, function ($data) {
			// return $data->where('kategori','1')->orderBy('id_berita','DESC');
			return $data;
		});
		// return
		return $data;
	}

	// public static function getEvent($input){
	// 	$table  = 'berita';
	// 	$select = '*';
		
	// 	$replace_field  = [
	// 		['old_name' => 'statu', 'new_name' => 'status'],
	// 		['old_name' => 'terbit', 'new_name' => 'tanggal'],
	// 		// ['old_name' => 'terbit', 'new_name' => 'jam'],
	// 	];
		
	// 	$param = [
	// 		'input'         => $input->all(),
	// 		'select'        => $select,
	// 		'table'         => $table,
	// 		'replace_field' => $replace_field
	// 	];
	// 	$datagrid = new Datagrid;
	// 	$data = $datagrid->datagrid_query($param, function ($data) {
	// 		return $data->where('kategori', '2')->orderBy('id_berita', 'DESC');
	// 		// return $data;
	// 	});
	// 	return $data;
	// }
	public static function getDatatable($request){
		$query = Berita::select('*', 'tanggal as date_indo');
		$query->when($request->id,fn($q)=>$q->where('kategori',$request->id));
		return $query->get();
	}
	
	public static function getPengumuman($input){
		$table  = 'berita';
		$select = '*';

		$replace_field  = [
			['old_name' => 'statu', 'new_name' => 'status'],
			['old_name' => 'terbit', 'new_name' => 'tanggal'],
			// ['old_name' => 'terbit', 'new_name' => 'jam'],
		];

		$param = [
			'input'         => $input->all(),
			'select'        => $select,
			'table'         => $table,
			'replace_field' => $replace_field
		];
		$datagrid = new Datagrid;
		$data = $datagrid->datagrid_query($param, function ($data) {
			return $data->where('kategori', '3')->orderBy('id_berita', 'DESC');
			// return $data;
		});
		return $data;
	}

	public static function getPrestasi($input){
		$table  = 'berita';
		$select = '*';

		$replace_field  = [
			['old_name' => 'statu', 'new_name' => 'status'],
			['old_name' => 'terbit', 'new_name' => 'tanggal'],
			// ['old_name' => 'terbit', 'new_name' => 'jam'],
		];
		
		$param = [
			'input'         => $input->all(),
			'select'        => $select,
			'table'         => $table,
			'replace_field' => $replace_field
		];
		$datagrid = new Datagrid;
		$data = $datagrid->datagrid_query($param, function ($data) {
			return $data->where('kategori', '4')->orderBy('id_berita', 'DESC');
			// return $data;
		});
		return $data;
	}
	
	public static function getProgram($input){
		$table  = 'berita';
		$select = '*';
		
		$replace_field  = [
			['old_name' => 'statu', 'new_name' => 'status'],
			['old_name' => 'terbit', 'new_name' => 'tanggal'],
			// ['old_name' => 'terbit', 'new_name' => 'jam'],
		];
		
		$param = [
			'input'         => $input->all(),
			'select'        => $select,
			'table'         => $table,
			'replace_field' => $replace_field
		];
		$datagrid = new Datagrid;
		$data = $datagrid->datagrid_query($param, function ($data) {
			return $data->where('kategori', '5')->orderBy('id_berita', 'DESC');
			// return $data;
		});
		return $data;
	}
	

	# Accessor start
	public static function getDateIndoAttribute($value){
		return Helpers::dateIndo($value);
	}
	# Accessor end


	public static function getBeritaPaginate(){
		return Berita::select('*', 'tanggal as date_indo')->where('kategori', 1)->orderBy('tanggal', 'DESC')->paginate(4);
	}
	public static function getEventPaginate(){
		return Berita::select('*', 'tanggal as date_indo')->where('kategori', 2)->orderBy('tanggal', 'DESC')->paginate(4);
	}
	public static function getPengumumanPaginate(){
		return Berita::select('*', 'tanggal as date_indo')->where('kategori', 3)->orderBy('tanggal', 'DESC')->paginate(5);
	}
	public static function getBeritaLimit($number){
		return Berita::where('kategori', 1)->orderBy('tanggal', 'DESC')->limit($number)->get();
	}
	public static function getEventLimit($number){
		return Berita::where('kategori', 2)->orderBy('tanggal', 'DESC')->limit($number)->get();
	}
	public static function getPengumumanLimit($number){
		return Berita::where('kategori', 3)->orderBy('tanggal', 'DESC')->limit($number)->get();
	}
	public static function filterBeritaById($params){
		return Berita::where([
			['kategori', 1],
			['id_berita', $params->id]
		])->first();
	}
	public static function filerAgendaById($params) {
		return Berita::where([
			['status', 1],
			['kategori', 2],
			['id_berita', $params->id]
		])->first();
	}
	public static function filterEventById($params){
		return Berita::where([
			['kategori', 2],
			['id_berita', $params->id]
		])->first();
	}
	public static function getPrestasiPaginate(){
		return Berita::where('kategori', '4')->where('status', '1')->orderBy('id_berita', 'DESC')->paginate(5);
	}
	public static function getUnggulanPaginate(){
		return Berita::where('kategori', '5')->where('status', '1')->limit('10')->orderBy('id_berita', 'DESC')->paginate(9);
	}
	public static function filterUnggulanById($params){
		return Berita::where([
			['kategori', 5],
			['status', 1],
			['id_berita', $params->id]
		])->first();
	}
	public static function filterPengumumanById($params){
		return Berita::where([
			['kategori', 3],
			['id_berita', $params->id]
		])->first();
	}
}
