<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendukungGuru extends Model
{
    use HasFactory;
    protected $table = 'data_pendukung_guru';
    protected $primaryKey = 'id_data_pendukung';
}
