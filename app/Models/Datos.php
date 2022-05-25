<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    use HasFactory;
    protected $table="datos"; //metodo para indicar a que tabla debe buscar en la base de datos
    protected $primaryKey="id_dato";
    protected $fillable=['dato_correo','sexo','estado_civil','edad','num_hijos','experiencia','antiguedad','grado_estudio'
    ,'compartido','traslado','horas_clase'];
}
