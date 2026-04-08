<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            'categoryName'=>'required|unique:categories,categoryName|min:2|max:45',
        ];
    }
    public function messages() : array
    {
        return [
            'categoryName.required' => 'El campo "Nombre de categoría" es obligatorio.',
            'categoryName.unique' => 'El campo "Nombre de categoría" ya existe.',
            'categoryName.min'=>'El campo "Nombre de categoría" debe tener como mínimo 2 caractéres.',
            'categoryName.max'=>'El campo "Nombre de categoría" debe tener 45 caractéres como máximo.',
        ];
    }
}
