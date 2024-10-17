<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['id','email','password','level','permissions','last_login','name_user','alias','phone','address_user','photo_user','active','created_at','updated_at'];

    public function data_guru() {
        return $this->belongsTo(Guru::class, 'guru_id', 'id_guru');
    }
    
    public static function getJsonEditor($input)
    {
        $table  = 'users';
        $select = 'users.*';
        
        $replace_field  = [
            ['old_name' => 'image', 'new_name' => 'photo_user'],
        ];

        $param = [
            'input'         => $input->all(),
            'select'        => $select,
            'table'         => $table,
            'replace_field' => $replace_field
        ];
        $datagrid = new Datagrid;
        $data = $datagrid->datagrid_query($param, function($data){
            return $data->where('level','2');
        });
        return $data;
    }
}
