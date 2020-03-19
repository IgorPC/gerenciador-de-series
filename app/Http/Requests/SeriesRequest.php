<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesRequest extends FormRequest
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
            'serie' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return[
          'required' => "O campo :attribute é obrigatorio",
          'serie.min' => "O campo nome precisa ter no minimo 3 caracteres"
        ];
    }
}
