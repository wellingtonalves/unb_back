<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProgramaRequest extends FormRequest
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
            'id_modelo_certificado' => 'required',
            'tx_nome_programa' => 'required',
            'dt_inicio_validade' => 'required|date|after:yesterday',
            'dt_termino_validade' => 'nullable|date|after:dt_inicio_validade',
            'tp_situacao_programa' => '',
            'qt_carga_horaria' => '',
            'tx_publico_alvo' => '',
            'tx_apresentacao' => '',
            'tx_url_imagem' => '',
            'bl_programa_destaque' => '',
            'id_criterio_programa' => '',
            'tx_orientacao' => '',
        ];
    }

    public function attributes()
    {
        return [
            'id_modelo_certificado' => 'Modelo do certificado',
            'tx_nome_programa' => 'Nome do programa',
            'dt_inicio_validade' => 'Data de início da validade',
            'dt_termino_validade' => 'Data de Início da validade',
            'tp_situacao_programa' => 'Situcão do programa',
            'qt_carga_horaria' => 'Carga horária',
            'tx_publico_alvo' => 'Público algo',
            'tx_apresentacao' => 'Apresentação',
            'tx_url_imagem' => 'URL da imagem',
            'bl_programa_destaque' => 'Programa destaque',
            'id_criterio_programa' => 'Critério do programa',
            'tx_orientacao' => 'Orientação',
        ];
    }
}
