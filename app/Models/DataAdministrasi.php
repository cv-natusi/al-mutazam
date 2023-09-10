<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAdministrasi extends Model
{
    use HasFactory;
    protected $table = 'data_administrasi';
    protected $primaryKey = 'id_administrasi';
}
