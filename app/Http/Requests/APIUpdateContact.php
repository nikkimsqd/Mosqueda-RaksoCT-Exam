<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class APIUpdateContact extends FormRequest
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
            'title' => 'string|nullable',
            'f_name' => 'string|nullable',
            'l_name' => 'string|nullable',
            'mobile_num' => 'numeric|digits:11|nullable',
            'comp_name' => 'string|nullable',
        ];
    }
}
