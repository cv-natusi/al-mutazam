<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita_pilihan extends Model
{
    use HasFactory;
    protected $table = 'berita_pilihan';
    protected $fillable = ['id_berita_pilihan','berita_id','user_id'];
    protected $primaryKey = "id_berita_pilihan";
    public $timestamps = false;
}
