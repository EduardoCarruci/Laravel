<?php

namespace proyecto\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalFormRequest extends FormRequest
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
            'apellido'=>'required|max:10',
            'areatrabajo'=>'required|max:15'
        ];
    }
}
