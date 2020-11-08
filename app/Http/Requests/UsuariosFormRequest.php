<?php

namespace App\Http\Requests;

use App\Http\Requests\request;

class UsuariosFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // es para validar los campos de la BD
            'Nombre_Usuario'=>'required|max:40',
            'Apellido_Pa_Usuario'=>'required|max:40',
            'Apellido_Ma_Usuario'=>'required|max:40',
            'Edad'=>'required|max:11',
            'Sexo'=>'required|max:1',
            'UserNme'=>'required|max:30',
            'Psswr'=>'required|max:20',

        ];
    }
}
