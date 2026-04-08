<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GalleryRequest extends FormRequest
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
            'galleryName'=>'required|'.Rule::unique('galleries','galleryName')
                                ->ignore($request->galleryId, 'galleryId').'|min:2|max:45'
        ];
    }
    public function messages() : array
    {
        return [
            'galleryName.required' => 'El campo "Nombre de galería" es obligatorio.',
            'galleryName.unique' => 'El campo "Nombre de galería" ya existe.',
            'galleryName.min'=>'El campo "Nombre de galería" debe tener como mínimo 2 caractéres.',
            'galleryName.max'=>'El campo "Nombre de galería" debe tener 45 caractéres como máximo.'

        ];
    }
}
