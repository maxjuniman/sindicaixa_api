<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'email|unique:users',
            'password' => 'string|min:6|max:12'
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O nome do usuário é obrigatório',
            'name.max' => 'Nome deve ter no máximo 255 caracteres',
            'name.unique' => 'Já existe um usuário cadastrado com este nome',
            'email.max' => 'E-mail deve ter no máximo 255 caracteres',
            'email.unique' => 'Já existe um usuário com o mesmo e-mail',
            'email.email' => 'O e-mail informado é inválido',
            'password.max' => 'Senha deve ter no máximo 12 caracteres',
            'password.min' => 'Senha deve ter no mínimo 6 caracteres',
        ];
    }
}