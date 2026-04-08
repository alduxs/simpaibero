<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TextRequest extends FormRequest
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
            'textName'=>'required|'.Rule::unique('texts','textName')
                                ->ignore($request->textId, 'textId').'|min:2|max:256',
            'textContent'=>'required',
        ];
    }
    public function messages() : array
    {
        return [
            'textName.required' => 'El campo "Nombre de texto" es obligatorio.',
            'textName.unique' => 'El campo "Nombre de texto" ya existe.',
            'textName.min'=>'El campo "Nombre de texto" debe tener como mínimo 2 caractéres.',
            'textName.max'=>'El campo "Nombre de texto" debe tener 45 caractéres como máximo.',
            'textContent.required' => 'El campo "Contenido de texto" es obligatorio.',
        ];
    }
}
