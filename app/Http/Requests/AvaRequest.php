<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AvaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //TODO - trocar para false quando implementar as policies
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
            'id_orgao' => 'required|exists:tb_orgao,id_orgao',
            'tx_url' => 'required|url|max:255',
            'tp_situacao_ava' => 'required|string|in:I,A',
            'tp_operacional' => 'required|string|in:S,N',
            'tx_token' => 'required|string|max:255',
            'tx_nome_ava' => 'required|string|max:255',
            'tp_ava' => 'required|string|in:MOODLE,CANVAS',
        ];
    }

    public function attributes()
    {
        return [
            'id_orgao' => 'Órgão do AVA',
            'tx_url' => 'URL base do AVA',
            'tp_situacao_ava' => 'Situação',
            'tp_operacional' => 'Operacional',
            'tx_token' => 'Token do AVA',
            'tx_nome_ava' => 'Nome do AVA',
            'tp_ava' => 'Tipo do AVA (MOODLE/CANVAS)',
        ];
    }
}
