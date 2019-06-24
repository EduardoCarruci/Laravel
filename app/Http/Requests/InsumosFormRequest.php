<?php

namespace proyecto\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsumosFormRequest extends FormRequest
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
            'nombre'=>'required|max:20',
            'descripcion'=>'required|max:20',
            'fabricante'=>'required|max:20',
            'fechavencimiento'=>'required'

            
        ];
    }
}
