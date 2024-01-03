<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAlunosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $alunoId = $this->route('id');
        return [
            'nome' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:alunos,email,' . $alunoId,
            'data_nascimento' => 'sometimes|required|date',
            'foto' => 'sometimes|image',
            'cpf' => 'sometimes|required|unique:alunos,cpf,' . $alunoId,
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email deve ser um email válido',
            'email.unique' => 'O campo email já está cadastrado',
            'data_nascimento.required' => 'O campo data de nascimento é obrigatório',
            'data_nascimento.date' => 'O campo data de nascimento deve ser uma data válida',
            'foto.required' => 'O campo foto é obrigatório',
            'foto.image' => 'O campo foto deve ser uma imagem válida',
            'cpf.required' => 'O campo cpf é obrigatório',
            'cpf.unique' => 'O campo cpf já está cadastrado',
        ];
    }
}
