<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExclusividadeOfertaRequest extends FormRequest
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
            'id_oferta' => 'required',
            'id_orgao_parceiro' => 'required',
            'id_tipo_exclusividade_oferta' => 'required',
            'tx_descricao_exclusividade' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'id_oferta' => 'Oferta',
            'id_orgao_parceiro' => 'Órgão Parceiros',
            'id_tipo_exclusividade_oferta' => 'Tipo Exclusividade',
            'tx_descricao_exclusividade' => 'Descrição',
        ];
    }
}
