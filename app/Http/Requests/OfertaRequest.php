<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OfertaRequest extends FormRequest
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
            'id_legado_oferta' => '',
            'id_ava' => 'required',
            'id_curso' => 'required',
            'id_pessoa_tutor' => '',
            'id_modelo_certificado' => 'required',
            'tx_nome_oferta' => 'required',
            'tx_nome_curso' => 'required',
            'qt_carga_horaria_oferta' => 'required|gte:0',
            'qt_carga_horaria_minima' => 'required|gte:0',
            'qt_vagas' => 'gte:0',
            'tp_com_tutoria' => ['required', Rule::in(['S', 'N']),],
            'dt_inicio_oferta' => 'required|date|after:yesterday',
            'dt_termino_oferta' => 'required|date|after:dt_inicio_oferta',
            'dt_inicio_inscricao' => 'nullable|date|after:yesterday',
            'dt_termino_inscricao' => 'nullable|date|after:dt_inicio_inscricao',
            'dt_inicio_selecao' => 'nullable|date|after:yesterday',
            'dt_termino_selecao' => 'nullable|date|after:dt_inicio_selecao',
            'qt_nota_minima_aprovacao' => 'gte:0',
            'tp_situacao_oferta' => ['required', Rule::in(['EM_CURSO', 'CONCLUIDA', 'PUBLICADA'])],
            'tp_tipo_turma' => '',
            'tx_nome_orgao_demandante' => '',
            'created_at' => '',
            'updated_at' => '',
            'id_tipo_oferta' => 'required',
            'id_parceiros' => '',
            'bl_disponivel' => '',
            'qt_duracao_dias' => '',
            'id_orgao_conteudista' => '',
            'id_certificador' => '',
            'tx_publico_alvo' => '',
            'bl_oferta_piloto' => '',
            'id_metodologia' => '',
            'tp_origem_oferta' => '',
        ];
    }

    public function attributes()
    {
        return [
            'id_legado_oferta' => '',
            'id_ava' => 'AVA',
            'id_curso' => 'Curso da oferta',
            'id_pessoa_tutor' => '',
            'id_modelo_certificado' => 'Modelo do certificado',
            'tx_nome_oferta' => 'Nome da oferta',
            'tx_nome_curso' => 'Nome do curso',
            'qt_carga_horaria_oferta' => 'Carga Horária da oferta',
            'qt_carga_horaria_minima' => 'Carga Horária mínima',
            'qt_vagas' => 'Quantidade de vagas',
            'tp_com_tutoria' => 'Oferta com tutoria',
            'dt_inicio_oferta' => 'Data de início da oferta',
            'dt_termino_oferta' => 'Data de término da oferta',
            'dt_inicio_inscricao' => 'Data de início da inscrição',
            'dt_termino_inscricao' => 'Data de término da inscrição',
            'dt_inicio_selecao' => 'Data de início da seleção',
            'dt_termino_selecao' => 'Data de término da seleção',
            'qt_nota_minima_aprovacao' => 'Nota mínima',
            'tp_situacao_oferta' => 'Situação da oferta',
            'tp_tipo_turma' => 'Tipo da turma',
            'tx_nome_orgao_demandante' => 'Orgão demandante',
            'created_at' => '',
            'updated_at' => '',
            'id_tipo_oferta' => 'Tipo da oferta',
            'id_parceiros' => 'Conteudista',
            'bl_disponivel' => 'Disponível',
            'qt_duracao_dias' => 'Disponibilidade',
            'id_orgao_conteudista' => 'Orgão conteudista',
            'id_certificador' => 'Certificador',
            'tx_publico_alvo' => 'Público alvo',
            'bl_oferta_piloto' => 'Oferta piloto',
            'id_metodologia' => 'Metodologia',
            'tp_origem_oferta' => 'Origem da oferta',
        ];
    }
}
