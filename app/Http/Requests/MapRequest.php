<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MapRequest extends FormRequest
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
            'mapName'=>'required|'.Rule::unique('maps','mapName')
                                ->ignore($request->mapId, 'mapId').'|min:2|max:45',
        ];
    }
    public function messages() : array
    {
        return [
            'mapName.required' => 'El campo "Nombre de mapa" es obligatorio.',
            'mapName.unique' => 'El campo "Nombre de mapa" ya existe.',
            'mapName.min'=>'El campo "Nombre de mapa" debe tener como mínimo 2 caractéres.',
            'mapName.max'=>'El campo "Nombre de mapa" debe tener 45 caractéres como máximo.',
        ];
    }
}
