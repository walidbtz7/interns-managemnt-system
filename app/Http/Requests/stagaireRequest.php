<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class stagaireRequest extends FormRequest
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
            'cin' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'tele' => 'required|min:10|max:14',
            'email' => 'required|email',
            'dd' => 'required',
            'df' => 'required',
            'etab' => 'required',

        ];



    }
}
