<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "mail" => "required|email"
        ];
    }
    public function messages()
    {
        return [
            'mail.required' =>  'Поле email должно быть заполнено',
            'mail.email' => 'Поле email должно быть заполнено',
        ];
    }
}
