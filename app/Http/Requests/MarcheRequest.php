<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarcheRequest extends FormRequest
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
            'créateur'=>'required',
            'nom'=>'required|max:255',
            'niveau'=>'required|max:30',
            'temps'=>'required',
            'region'=>'required|max:150',
        ];
    }
}
