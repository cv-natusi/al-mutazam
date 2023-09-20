<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailDataPendidikanGuru extends Model
{
    use HasFactory;
    protected $table = 'detail_data_pendidikan_guru';
    protected $primaryKey = 'id_detail_data_pendidikan';
}
