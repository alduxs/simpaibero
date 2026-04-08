<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
    public function rules(Request $request): array
    {
        return [
        'productName'=>'required|string|max:50|'.Rule::unique('products','productName')
                                ->ignore($request->productId, 'productId').'',
        'productDescription'=>'nullable|string',
        'productCategoryId'=>'required|exists:categories,categoryId',
        'productFichaTecnica' => 'nullable|file|mimes:pdf|max:5120',
        'productManual' => 'nullable|file|mimes:pdf|max:5120'
        ];
    }
    public function messages() : array
    {
        return [
            'productName.required' => 'El campo "Nombre" es obligatorio.',
            'productName.unique' => 'El campo "Nombre" ya ha sido registrado.',
            'productName.string' => 'El campo "Nombre" debe ser un texto.',
            'productDescription.string' => 'El campo "Descripción" debe ser un texto.',
            'productCategoryId.exists' => 'La categoría seleccionada no es válida.'
        ];
    }
}
