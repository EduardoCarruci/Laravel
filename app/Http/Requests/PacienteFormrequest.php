<?php

namespace proyecto\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteFormrequest extends FormRequest
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
            'cedula'=>'required',
            'numero'=>'required',
            'nombre'=>'required|max:20',
            'apellido'=>'required|max:20',
            'telefono'=>'required|max:20',
            'direccion'=>'required|max:20',
            'edad'=>'required'
            //'idexpediente'=>'required'
            
        ];
    }
}
