<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
{
    /**
     * Determina se o usuário está autorizado a fazer esta requisição
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação para o projeto
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'link' => 'nullable|url|max:2048',
        ];

        if (request()->method() === 'PUT' || request()->method() === 'PATCH') {
            $projectId = request()->route('project');
            $rules['title'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('projects', 'title')->ignore($projectId)
            ];
        } else {
            $rules['title'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('projects', 'title')
            ];
        }

        if (request()->has('categories')) {
            $rules['categories'] = 'array';
            $rules['categories.*'] = 'exists:categories,id';
        }

        return $rules;
    }

    /**
     * Obter mensagens de erro personalizadas para as regras de validação.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório',
            'title.unique' => 'Este título já está em uso',
            'description.required' => 'A descrição é obrigatória',
            'categories.*.exists' => 'Uma ou mais categorias selecionadas não existem',
            'image.image' => 'O arquivo deve ser uma imagem',
            'image.mimes' => 'A imagem deve ser do tipo: jpeg, png, jpg, gif, svg ou webp',
            'image.max' => 'A imagem não pode ser maior que 2MB',
            'link.url' => 'O link deve ser uma URL válida',
            'link.max' => 'O link não pode ser maior que 2048 caracteres',
        ];
    }
}
