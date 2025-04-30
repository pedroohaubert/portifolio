<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TopicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Regras de validação para o tópico
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255',
            'color' => 'nullable|string|size:7|regex:/^#[0-9A-F]{6}$/i',
        ];

        if (request()->method() === 'PUT' || request()->method() === 'PATCH') {
            $topicId = request()->route('topic');
            $rules['name'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('topics', 'name')->ignore($topicId)
            ];
        } else {
            $rules['name'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('topics', 'name')
            ];
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
            'name.required' => 'O nome é obrigatório',
            'name.unique' => 'Este nome já está em uso',
            'color.regex' => 'O formato da cor deve ser #RRGGBB',
            'color.size' => 'O código de cor deve ter 7 caracteres (#RRGGBB)',
        ];
    }
}
