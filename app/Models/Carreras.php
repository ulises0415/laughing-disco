<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    use HasFactory;
    protected $table="carreras"; //metodo para indicar a que tabla debe buscar en la base de datos
    protected $primaryKey="id_carrera";
    protected $fillable=['carrera'];
}
