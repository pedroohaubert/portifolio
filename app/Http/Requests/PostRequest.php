<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação para o post
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'content' => 'required|string',
        ];

        if (request()->method() === 'PUT' || request()->method() === 'PATCH') {
            $postId = request()->route('post');
            $rules['title'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'title')->ignore($postId)
            ];
        } else {
            $rules['title'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('posts', 'title')
            ];
        }

        if (request()->has('topics')) {
            $rules['topics'] = 'array';
            $rules['topics.*'] = 'exists:topics,id';
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
            'content.required' => 'O conteúdo é obrigatório',
            'topics.*.exists' => 'Um ou mais tópicos selecionados não existem',
        ];
    }
}
