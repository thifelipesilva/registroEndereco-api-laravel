<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BairroFormRequest extends FormRequest
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
            'codigoMunicipio' => 'required|numeric',
            'nome' => 'required|unique:App\Models\Bairro,nome|min:4',
            'status' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute é obrigatório!',
            'nome.unique' => 'O nome já foi cadastrado',
            'nome.min' => 'Nome precisa ter mais de 4 letras',
            'numeric' => 'status é 1(ativo) e 2(inativo)'
        ];
    }
}
