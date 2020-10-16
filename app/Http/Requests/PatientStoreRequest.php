<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientStoreRequest extends FormRequest
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
            'name' => 'required|max:80',
            'cpf' => 'required|unique:patients|max:14',
            'email' => 'required|unique:patients',
            'postcode' => 'required|max:10',
            'number_home' => 'required|max:10',
        ];
    }
}
