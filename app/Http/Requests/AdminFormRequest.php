<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminFormRequest extends FormRequest
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
            'cep' => 'min:8|required',
            'state' => 'required',
            'address_street' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address_number' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        $arrAutoCepError = array_fill_keys([
            'cep.required',
            'state.required',
            'address_street.required',
            'city.required',
            'district.required'
        ], 'CEP obrigatório!');

        return array_merge(
            $arrAutoCepError,
            [
                'address_number.required' => 'Número obrigatório!',
                'description.required' => 'Descrição da solicitação obrigatória!',
                'cep.min' => 'CEP em formato inválido.'
            ]
        );
    }
}
