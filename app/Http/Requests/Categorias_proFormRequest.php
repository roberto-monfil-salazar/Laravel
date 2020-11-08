<?php

namespace App\Http\Requests;

use App\Http\Requests\request;

class Categorias_proFormRequest extends Request
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
            'categoria'=>'required|max:20',
            'Nombre'=>'required|max:25',
        ];
    }
}
