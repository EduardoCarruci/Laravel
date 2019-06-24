<?php

namespace proyecto\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedienteFormRequest extends FormRequest
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
            'historial'=> 'required',
            'idficha_diagnostico'=> 'required',
            'cedula'=> 'required'
        ];
    }
}
