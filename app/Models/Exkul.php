<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exkul extends Model
{
    use HasFactory;
    protected $table = 'exkul';
    protected $fillable = ['id_exkul', 'nama_exkul', 'deskripsi', 'foto'];
    protected $primaryKey = "id_exkul";
    public $timestamps = false;

    public static function getEkskul($input)
    {
        $table  = 'exkul';
        $select = '*';

        $replace_field  = [
            ['old_name' => 'status_exku', 'new_name' => 'status_exkul'],
        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;
        $data = $datagrid->datagrid_query($param, function ($data) {
            return $data->where('type_exkul', 1);
            // return $data;
        });
        return $data;
    }
    public static function getExkulPaginate()
    {
        return Exkul::where('status_exkul', '1')->where('type_exkul', 1)->orderBy('id_exkul', 'DESC')->paginate(12);
    }


    public static function getFasilitas($input)
    {
        $table  = 'exkul';
        $select = '*';

        $replace_field  = [
            ['old_name' => 'status_exku', 'new_name' => 'status_exkul'],
        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;
        $data = $datagrid->datagrid_query($param, function ($data) {
            return $data->where('type_exkul', 2);
            // return $data;
        });
        return $data;
    }

    public static function getFasilitasPaginate()
    {
        return Exkul::where('type_exkul', 2)->orderBy('id_exkul', 'DESC')->paginate(9);
    }

    public static function filterExkulById($params)
    {
        return Exkul::where([
            ['status_exkul', 1],
            ['type_exkul', 1],
            ['id_exkul', $params->id]
        ])->first();
    }
}
