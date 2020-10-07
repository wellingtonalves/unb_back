<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_tematica_curso' => 'required',
            'qt_carga_horaria_minima' => 'required|numeric',
            'tx_nome_curso' => 'required|string|max:255',
            'tp_situacao_curso' => 'required|string|in:I,A',
            'tp_origem_curso' => 'required|string|in:ENAP,MIGRADO',
            'tx_conteudo_programatico' => 'required|string',
            'tx_apresentacao' => 'required|string',
            'dt_lancamento' => 'required',
//            'tx_url_imagem_curso' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'id_tematica_curso' => 'Temática curso',
            'qt_carga_horaria_minima' => 'Carga horária Mínima',
            'tx_nome_curso' => 'Nome do curso',
            'tp_situacao_curso' => 'Situação do curso',
            'tx_conteudo_programatico' => 'Conteúdo programático',
            'tx_apresentacao' => 'Apresentação',
//            'tx_url_imagem_curso' => 'required|string',
            'tx_url_video_curso' => 'Url do vídeo do curso',
            'bl_destaque_curso' => 'Destaque do curso',
            'dt_lancamento' => 'Data do lançamento',
        ];
    }
}
