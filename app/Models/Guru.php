<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $table = 'data_guru';
    protected $primaryKey = 'id_guru';

    public static function getStrukturalPaginate()
    {
        return Guru::orderBy('id_guru')->orderBy('id_guru', 'DESC')->paginate(12);
    }
}
