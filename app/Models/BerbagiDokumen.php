<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerbagiDokumen extends Model
{
    use HasFactory;
    protected $table = 'berbagi_dokumen';
    protected $primaryKey = "id_berbagi_dokumen";
}
