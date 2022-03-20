<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MissLogFormRequest extends FormRequest
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
            'user_id' => 'required',
            'title' => 'required|max:100',
            'content_a' => 'required',
            'content_b' => 'required',
            'content_c' => 'required',
        ];
    }
}
