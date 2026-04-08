<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $isUpdating = $this->route('user');

        // // O el nombre que tenga tu parámetro en la ruta
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . ($isUpdating ? $isUpdating->id : ''),
            'password' => ($isUpdating ? 'nullable' : 'required') .'|string|min:6|confirmed',
        ];
    }
    public function messages() : array
    {
        return [
            'name.required' => 'El campo "Nombre" es obligatorio.',
            'name.string' => 'El campo "Nombre" debe ser una cadena de texto.',
            'name.max' => 'El campo "Nombre" debe tener como máximo 255 caracteres.',
            'email.required' => 'El campo "Email" es obligatorio.',
            'email.string' => 'El campo "Email" debe ser una cadena de texto.',
            'email.email' => 'El campo "Email" debe ser una dirección de correo electrónico válida.',
            'email.max' => 'El campo "Email" debe tener como máximo 255 caracteres.',
            'email.unique' => 'El campo "Email" ya existe.',
            'password.required' => 'El campo "Contraseña" es obligatorio.',
            'password.string' => 'El campo "Contraseña" debe ser una cadena de texto.',
            'password.min' => 'El campo "Contraseña" debe tener como mínimo 6 caracteres.',
            'password.confirmed' => 'Los campos "Contraseña" y "Confirmar Contraseña" no coinciden.',
        ];
    }
}
