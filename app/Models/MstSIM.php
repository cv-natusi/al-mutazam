<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstSIM extends Model
{
    use HasFactory;
    protected $table = 'master_sim';
    protected $primaryKey = "id_mst_sim";
    
}
