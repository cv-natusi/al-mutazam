<?php
namespace App\Helpers;
use App\Models\Identity;

class Helpers{
	# Date start
	public static function dateIndo($date,$format='hari'){ # Opsi $format[tanggal,hari]
		$date = date('Y-m-d',strtotime($date));
		$bulan = [
			1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		];
		$split = explode('-', $date);
		if($format=='hari'){ # Dengan nama hari
			$hari = Helpers::getDay(date('D',strtotime($date)));
			return "$hari, $split[2] ".$bulan[(int)$split[1]]." $split[0]";
		}else{ # Tanpa nama hari
			return "$split[2] ".$bulan[(int)$split[1]]." $split[0]";
		}
	}
	public static function getDay($days){
		if($days=='Sun'){
			$hari = 'Minggu';
		}elseif($days=='Mon'){
			$hari = 'Senin';
		}elseif($days=='Tue'){
			$hari = 'Selasa';
		}elseif($days=='Wed'){
			$hari = 'Rabu';
		}elseif($days=='Thu'){
			$hari = 'Kamis';
		}elseif($days=='Fri'){
			$hari = 'Jumat';
		}else{
			$hari = 'Sabtu';
		}
		return $hari;
	}
	# Date end
	public static function resAjax($data=[]){
		$keyData = ['message','code','response'];
		$arr = [];
		foreach($keyData as $key => $val){
			$arr[$val] = isset($data[$val]) ? $data[$val] : ( # Cek key, apakah sudah di set
				$val=='code' ? 500 : (
					$val=='message' ? '-' : []
				)
			);
		}

		$code = $arr['code'];
		$msg = $arr['message'];

		$metadata = [
			'code'    => $arr['code'],
			'message' => $arr['message'],
		];
		$payload['metadata'] = $metadata;
		if($code>=200 && $code<250){
			$payload['response'] = $arr['response'];
		}
		return response()->json($payload,$code);
	}
	public static function getIdentity(){
		return $data = Identity::first();
	}
}