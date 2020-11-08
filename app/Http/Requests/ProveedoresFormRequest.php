<?php

namespace App\Http\Requests;

use App\Http\Requests\request;

class ProveedoresFormRequest extends Request
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
            'Nombre_proveedor'=>'required|max:30',
            'CorreoElectronico_proveedor'=>'required|max:30',
            'RazonSocual_Proveedor'=>'required|max:30',
        ];
    }
}
