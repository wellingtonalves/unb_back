<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValorExclusividadeOfertaRequest extends FormRequest
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
            'id_exclusividade_oferta' => 'required',
            'valor_exclusividade' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'id_exclusividade_oferta' => 'Exclusividade',
            'valor_exclusividade' => 'Valor',
        ];
    }
}
