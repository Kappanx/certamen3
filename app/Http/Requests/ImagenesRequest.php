<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagenesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|min:2|max:20',
            /*
            'cuenta_user' => 'bail|required|exists:cuentas,user',*/
            'archivo' => 'required|image',
        ];
    }

    public function messages():array
    {
        return [
            'titulo.required' => 'Indique el titulo de la imagen',
            'titulo.min' => 'El titulo debe tener entre 2 y 20 caracteres',
            'titulo.max' => 'El titulo debe tener entre 2 y 20 caracteres',/*
            'cuenta_user.required' => 'Ningun usuario detectado',
            'cuenta_user.exist' => 'Ningun usuario detectado',*/
            'archivo.required' => 'Ingrese una imagen',
            'archivo.image' => 'Ingrese una imagen',
        ];
    }
}
