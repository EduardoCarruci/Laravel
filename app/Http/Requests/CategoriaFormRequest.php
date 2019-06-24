<?php

namespace proyecto\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

        // SE MODIFICA A TRUE 
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    //declarar reglas

    // son los objetos en el Formulario los que estan aca abajo
    public function rules()
    {
        return [
            //
            'nombre'=> 'required|max:50',
            'descripcion'=> 'max:256',
        ];
    }
}
