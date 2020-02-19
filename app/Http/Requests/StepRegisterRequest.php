<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepRegisterRequest extends FormRequest
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
            'thumnail' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
            'title' => 'max:255|nullable',
            'target_time' => 'max:255|nullable',
            'content' => 'max:255|nullable',
            'id' => 'integer|nullable',
        ];
    }
}
