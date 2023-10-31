<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
	# Custom response start
	public static function resApi($msg='Terjadi kesalahan sistem',$code=500,$data=[]){ # Template rest api
		return response()->json([
			'metadata' => [
				'message' => $msg,
				'code'    => $code,
			],
			'response' => $data,
		],$code);
	}
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
	# Custom response End
	# Logging start
	public static function logging($param=[]){
		# Modify parameter for logging start
		for($i=0; $i<5; $i++){
			$arr[$i] = isset($param[$i]) ? $param[$i] : (
				$i==0 ? 'NO MESSAGES' : (
					$i==1 ? false : '-'
				)
			);
		}
		# Modify parameter for logging end

		$title   = $arr[0];
		$status  = $arr[1]; # Status => true{jika program berhasil}, false{jika program gagal}
		$errMsg  = $arr[2];
		$errLine = $arr[3];
		$data    = $arr[4];

		$res = [
			$title => [
				'messageErr' => $errMsg,
				'line'       => $errLine,
				'data'       => $data,
			]
		];
		if($status){ # If $status => true, unset key
			unset($res[$title]['messageErr'],$res[$title]['line']);
		}
		Log::info(json_encode($res, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
		return true;
	}
	# Logging end
}