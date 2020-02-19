<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
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
            'icon' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'name' => 'max:255|nullable',
            'email' => 'max:255|nullable',
            'introduction' => 'max:255|nullable',
        ];
    }
}
