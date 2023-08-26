<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;
    protected $table = 'menu';
    protected $fillable = ['id_menu','parent_id','nama_menu','aktif'];
    protected $primaryKey = "id_menu";
    public $timestamps = false;
}
