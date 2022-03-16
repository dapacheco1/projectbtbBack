<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Model\Person;

class Usuario extends Model
{
    use HasFactory;
    protected $table="usuarios";
    protected $fillable = ['idPerson','username','rol','password','email','status'];
    protected $hidden = ['password'];

    //Configurar relaciones uno - uno
    public function person()
    {
        return $this->hasOne(Person::class,'id' ,'idPerson');
    }
}
