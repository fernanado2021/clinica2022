<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;
   protected $table = "users";
    protected $fillable = [

        'name','email','password','id_consultorio','sexo','documento','telefono','rol'

    ];

    public $timestamps = false;

}
