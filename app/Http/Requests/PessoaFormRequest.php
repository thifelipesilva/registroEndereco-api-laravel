<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required|min:4',
            'sobrenome' => 'required|min:4',
            'idade' => 'required|numeric',
            'login' => 'required|min:4',
            'senha' => 'required|min:5',
            'status' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute é obrigatório!',
            'nome.min' => 'Nome precisa ter mais de 4 letras',
            'sobrenome.min' => 'Sobrenome precisa ter mais de 4 letras',
            'login.min' => 'Login precisa ter mais de 4 letras',
            'senha.min' => 'Senha precisa ter mais de 5 caracteres',
            'status.numeric' => 'status é 1(ativo) e 2(inativo)'
        ];
    }
}
