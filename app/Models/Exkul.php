<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exkul extends Model
{
    use HasFactory;
    protected $table = 'exkul';
    protected $fillable = ['id_exkul','nama_exkul','deskripsi','foto'];
    protected $primaryKey = "id_exkul";
    public $timestamps = false;
}
