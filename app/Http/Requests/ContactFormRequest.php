<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{

    protected $redirect = '/#contact';
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
            'name' => 'required|min:3',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'name.required' => 'O seu nome é obrigatório.',
            'name.min' => 'Seu nome precisa ter pelo menos 3 caracteres.',
          'email.required' => 'O seu email é obrigatório.',
          'subject.required' => 'O assunto é obrigatório.',
          'message.required' => 'A mensagem é obrigatória.',
        ];
    }
}
