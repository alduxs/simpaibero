<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PointRequest extends FormRequest
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
        'pointName'=>'required|string|max:50|unique:points,pointName',
        'pointAddress'=>'nullable|string|max:200',
        'pointLat'=>'required|numeric|min:-90|max:90',
        'pointLng'=>'required|numeric|min:-180|max:180',
        ];
    }
    public function messages() : array
    {
        return [
            'pointName.required' => 'El campo "Nombre" es obligatorio.',
            'pointName.unique' => 'El campo "Nombre" ya ha sido registrado.',
            'pointName.string' => 'El campo "Nombre" debe ser un texto.',
            'pointName.max' => 'El campo "Nombre" debe tener un máximo de 50 caracteres.',
            'pointAddress.string' => 'El campo "Dirección" debe ser un texto.',
            'pointAddress.max' => 'El campo "Dirección" debe tener un máximo de 200 caracteres.',
            'pointLat.required' => 'El campo "Latitud" es obligatorio.',
            'pointLng.required' => 'El campo "Longitud" es obligatorio.',
            'pointLat.min' => 'El campo "Latitud" debe ser un número entre -90 y 90.',
            'pointLng.min' => 'El campo "Longitud" debe ser un número entre -180 y 180.',
        ];
    }
}
