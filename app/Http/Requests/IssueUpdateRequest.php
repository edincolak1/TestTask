<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IssueUpdateRequest extends FormRequest
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
            'title' => 'filled',
            'stage_id' => 'filled',
            'user_id' => 'filled',           
        ];

    }

    public function messages()
    {
        return [
            'title.filled' => 'title attribute must be filled',
            'stage_id.filled' => 'stage_id attribute must be filled',           
            'user_id.filled' => 'user_id attribute must be filled',                   
        ];       
    }

}
