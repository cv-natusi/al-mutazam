<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['id','email','password','level','permissions','last_login','name_user','alias','phone','address_user','photo_user','active','created_at','updated_at'];
}
