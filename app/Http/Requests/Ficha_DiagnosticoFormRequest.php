<?php

namespace proyecto\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Ficha_DiagnosticoFormRequest extends FormRequest
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
            
         
            'enfermedad'=> 'required',
            'tipo'=> 'required',
            'diagnostico'=> 'required',
            'recomendaciones'=> 'required',
            'intervencion'=> 'required',
            'orden'=> 'required',
            'idorden'=> 'required',

        ];
    }
}
