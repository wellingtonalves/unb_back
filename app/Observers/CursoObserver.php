<?php

namespace App\Observers;


use App\Models\Curso;

class CursoObserver
{
    /**
     * * Handle the curso "created" event.
     *
     * @param Curso $curso
     * @return Curso
     */
    public function created(Curso $curso)
    {
        $curso->tx_url_imagem_curso = 'https://cdn.evg.gov.br/cursos/'.$curso->id_curso.'_EVG/imagem_curso_'.$curso->id_curso.'.png';
        $curso->save();
        return $curso;
    }

    /**
     * Handle the curso "updated" event.
     *
     * @param  \App\Curso  $curso
     * @return void
     */
    public function updated(Curso $curso)
    {
        //
    }

    /**
     * Handle the curso "deleted" event.
     *
     * @param  \App\Curso  $curso
     * @return void
     */
    public function deleted(Curso $curso)
    {
        //
    }

    /**
     * Handle the curso "restored" event.
     *
     * @param  \App\Curso  $curso
     * @return void
     */
    public function restored(Curso $curso)
    {
        //
    }

    /**
     * Handle the curso "force deleted" event.
     *
     * @param  \App\Curso  $curso
     * @return void
     */
    public function forceDeleted(Curso $curso)
    {
        //
    }
}
