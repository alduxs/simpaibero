<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
        'imageName'=>'required|file|mimes:jpg,jpeg,png',
        'imagePosition'=>'required|integer|min:1',
        ];
    }
    public function messages() : array
    {
        return [
            'imageName.required' => 'El campo "Imagen" es obligatorio.',
            'imageName.file' => 'El campo "Imagen" debe ser un archivo.',
            'imageName.mimes' => 'El campo "Imagen" debe ser un archivo de tipo: jpg, jpeg, png.',
            'imagePosition.required' => 'El campo "Posición" es obligatorio.',
            'imagePosition.integer' => 'El campo "Posición" debe ser un número entero.',
            'imagePosition.min' => 'El campo "Posición" debe ser un número mayor o igual a 1.',
        ];
    }
}
