<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table="usuarios";
    protected $filleable = ['idPerson','username','rol','password','email','status'];
    protected $hidden = ['password'];
}
