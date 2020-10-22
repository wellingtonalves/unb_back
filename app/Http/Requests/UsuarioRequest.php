<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'id_situacao_usuario' => 'required',
            'id_perfil' => 'required',
            'tx_login_usuario' => 'required|string|max:255',
            'pessoa.tx_nome_pessoa' => 'required|string|max:255',
            'pessoa.tp_sexo' => 'required|string|in:M,F',
            'pessoa.tx_email_pessoa' => 'required|string|max:255',
            'pessoa.dt_nascimento' => 'required',
            'pessoa.sg_pais_nacionalidade' => 'required',
            'pessoa.nr_cpf' => 'required_if:pessoa.sg_pais_nacionalidade,BR',
            'pessoa.nr_passaporte' => 'required_unless:pessoa.sg_pais_nacionalidade,BR',
        ];
    }

    public function attributes()
    {
        return [
            'id_situacao_usuario' => 'Situação',
            'id_perfil' => 'Perfil',
            'tx_login_usuario' => 'Login',
            'pessoa.tx_nome_pessoa' => 'Nome',
            'pessoa.tp_sexo' => 'Sexo',
            'pessoa.tx_email_pessoa' => 'E-mail',
            'pessoa.dt_nascimento' => 'Data de nascimento',
            'pessoa.sg_pais_nacionalidade' => 'País',
            'pessoa.nr_cpf' => 'CPF',
            'pessoa.nr_passaporte' => 'Passaporte',
        ];
    }
}
