<?php

namespace App\Models;

class ProgramaCurso extends AbstractModel
{
    protected $table = 'tb_programa_curso';
    protected $primaryKey = 'id_programa_curso';

    protected $fillable = [];

    public function cursos()
    {

    }
}
