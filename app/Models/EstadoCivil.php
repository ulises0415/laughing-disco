<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoCivil extends Model
{
    use HasFactory;
    protected $table="estado_civil"; //metodo para indicar a que tabla debe buscar en la base de datos
    protected $primaryKey="id_estado_civil";
    protected $fillable=['descripcion'];
}
