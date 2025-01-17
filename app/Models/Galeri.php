<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model{
	use HasFactory;
	protected $table = 'galeri';
	protected $fillable = ['id_galeri', 'file_galeri', 'deskripsi_galeri', 'kategori_galeri'];
	protected $primaryKey = "id_galeri";
	public $timestamps = false;
	
	public static function getGaleri($input){
		$table  = 'galeri';
		$select = '*';
		
		$replace_field  = [
			['old_name' => 'statu', 'new_name' => 'status_galeri'],
		];
		
		$param = [
			'input'         => $input->all(),
			'select'        => $select,
			'table'         => $table,
			'replace_field' => $replace_field
		];
		$datagrid = new Datagrid;
		$data = $datagrid->datagrid_query($param, function ($data) {
			return $data;
			// return $data;
		});
		return $data;
	}
	public static function getGaleriesPaginate(){
		return Galeri::where('status_galeri', '1')->orderBy('id_galeri', 'DESC')->paginate(9);
	}
	
	public static function filterGaleriById($params){
		return Galeri::where([
			['status_galeri', 1],
			// ['file_galeri', 1],
			['id_galeri', $params->id]
			])->first();
		}
	}
