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
            'id_situacao_usuario' => 'sometimes',
            'id_perfil' => 'sometimes',
            'tx_login_usuario' => 'sometimes|string|max:255',
            'tx_senha_usuario' => 'string|max:255',
            'pessoa.tx_nome_pessoa' => 'sometimes|string|max:255',
            'pessoa.tp_sexo' => 'sometimes|string|in:M,F',
            'pessoa.tx_email_pessoa' => 'sometimes|string|max:255',
            'pessoa.dt_nascimento' => 'sometimes',
            'pessoa.sg_pais_nacionalidade' => 'sometimes',
            'pessoa.nr_cpf' => 'required_if:pessoa.sg_pais_nacionalidade,BR',
            'pessoa.nr_passaporte' => 'sometimes|required_unless:pessoa.sg_pais_nacionalidade,BR',
        ];
    }

    public function attributes()
    {
        return [
            'id_situacao_usuario' => 'Situação',
            'id_perfil' => 'Perfil',
            'tx_login_usuario' => 'Login',
            'tx_senha_usuario' => 'Senha',
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
