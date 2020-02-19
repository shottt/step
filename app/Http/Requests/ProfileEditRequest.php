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

    public function messages()
    {
        return [
            'name.max' => '名前は最大20文字まで入力できます',
            'email.email' => 'メールアドレスの形式が正しくありません',
            'email.max' => 'メールアドレスは最大255文字まで入力できます',

        ];
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
            'name' => 'max:20|nullable',
            'email' => 'max:255|email|nullable',
            'introduction' => 'max:255|nullable',
        ];
    }
}
