<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;
    protected $table="persons";
    protected $fillable = ['name','lastname','phone','direction','status'];

    //Configurar relacion inversa (uno a uno)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idPerson', 'id');
    }

}
