<?php

namespace proyecto\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicoFormRequest extends FormRequest
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
           
            'numero'=>'required',
            'nombre'=>'required|max:20',
            'apellido'=>'required|max:20',
            'telefono'=>'required|max:20'
          
            
        ];
    }
}
