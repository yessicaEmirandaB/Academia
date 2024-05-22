<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    public function alumnos(){
        return $this->belongsToMany(Alumnos::class,'Detalle_alumnos_cursos');
    }
    public function maestros(){
        return $this->belongsToMany(Maestros::class,'Detalle_Curso_Maestros');
    }
    public function materia(){
        return $this->hasMany(Materias::class,'id');
    }
}
