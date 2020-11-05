<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaAgendadaRequest extends FormRequest
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
            'id_ava' => 'nullable|exists:tb_ava,id_ava',
            'tx_nome_tarefa_agendada' => 'required|string|max:255',
            'tx_nome_comando' => 'required|string|max:255',
            'tx_minuto' => 'required|string|max:255',
            'tx_hora' => 'required|string|max:255',
            'tx_dia_mes' => 'required|string|max:255',
            'tx_mes' => 'required|string|max:255',
            'tx_dia_semana' => 'required|string|max:255',
            'tp_situacao_tarefa_agendada' => 'required|string|in:A,I',
        ];
    }

    public function attributes()
    {
        return [
            'id_ava' => 'AVA da rotina',
            'tx_nome_tarefa_agendada' => 'Nome da rotina',
            'tx_nome_comando' => 'Comando do artisan',
            'tx_minuto' => 'Minuto',
            'tx_hora' => 'Hora',
            'tx_dia_mes' => 'Dia do mês',
            'tx_mes' => 'Mês do ano',
            'tx_dia_semana' => 'Dia da semana',
            'tp_situacao_tarefa_agendada' => 'Situação (Ativa/Inativa)',
        ];
    }
}
