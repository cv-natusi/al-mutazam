<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amtv extends Model
{
    use HasFactory;
    protected $table = 'amtv';
    protected $fillable = ['id_amtv','judul_amtv','file','status_amtv'];
    protected $primaryKey = "id_amtv";
    public $timestamps = false;

    public static function getAmtv($input)
    {
        $table  = 'amtv';
        $select = '*';
        
        $replace_field  = [
            ['old_name' => 'statu', 'new_name' => 'status_amtv'],
        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;
        $data = $datagrid->datagrid_query($param, function($data){
            return $data;
            // return $data;
        });
        return $data;
    }
}
