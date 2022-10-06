<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileRequest extends FormRequest
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
            'contact_csv' => 'required|mimes:csv,txt',
            'title' => 'required|string',
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'mobile_num' => 'required|string',
            'comp_name' => 'required|string',
        ];
    }
}
