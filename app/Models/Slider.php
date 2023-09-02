<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Libraries\Datagrid;
use Sentinel;

class Slider extends Model
{
    use HasFactory;
    protected $table = 'slider';
    protected $fillable = ['id_slider','gambar'];
    protected $primaryKey = "id_slider";
    public $timestamps = false;

    public static function getSlider($input)
    {
        $table  = 'slider';
        $select = '*';
        
        $replace_field  = [
            // ['old_name' => 'status_exku', 'new_name' => 'status_exkul'],
        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;
        $data = $datagrid->datagrid_query($param, function($data){
            return $data->limit(5);
            // return $data;
        });
        return $data;
    }
}
