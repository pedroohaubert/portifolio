<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'color' => 'required|string|max:20',
        ];

        // Para atualizações, tornamos o nome único exceto para o próprio registro
        if (request()->method() === 'PUT' || request()->method() === 'PATCH') {
            $categoryId = request()->route('category');
            $rules['name'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')->ignore($categoryId)
            ];
        } else {
            $rules['name'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'name')
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
            'color.required' => 'A cor é obrigatória',
        ];
    }
}
