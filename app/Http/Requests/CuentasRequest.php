<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CuentasRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user' => 'required|min:2|max:20|unique:cuentas',
            'password' => 'bail|required|min:6|max:20|same:password2',/*
            'perfil_id' => 'bail|required|integer|exists:perfiles,id',*/
            'nombre' => 'required|min:2|max:20|alpha',
            'apellido' => 'required|min:2|max:20|alpha',
        ];
    }

    public function messages():array
    {
        return [
            'user.required' => 'Indique nombre del usuario',
            'user.min' => 'El nombre debe tener entre 2 y 20 caracteres',
            'user.max' => 'El nombre debe tener entre 2 y 20 caracteres',
            'password.required' => 'Indique contraseña del usuario',
            'password.min' => 'La contraseña debe tener entre 6 y 20 caracteres',
            'password.max' => 'La contraseña debe tener entre 6 y 20 caracteres',
            'password.same' => 'Las contraseñas no coinciden',
            'perfil_id.required' => 'Indique Id del usuario',/*
            'perfil_id.integer' => 'Id no válido',
            'perfil_id.exists' => 'Id no válido',*/
            'nombre.required' => 'Ingrese su nombre',
            'nombre.min' => 'El nombre debe tener entre 2 y 20 caracteres',
            'nombre.max' => 'El nombre debe tener entre 2 y 20 caracteres',
            'nombre.alpha' => 'Ingrese un nombre valido',
            'apellido.required' => 'Ingrese su apellido',
            'apellido.min' => 'El apellido debe tener entre 2 y 20 caracteres',
            'apellido.max' => 'El apellido debe tener entre 2 y 20 caracteres',
            'apellido.alpha' => 'Ingrese un apellido valido',
        ];
    }
}
