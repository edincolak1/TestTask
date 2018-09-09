<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IssueStoreRequest extends FormRequest
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
            'title' => 'required',
            'stage_id' => 'required',
            'user_id' => 'required',
            'order' => 'required'            
        ];

    }

    public function messages()
    {
        return [
            'title.required' => 'title attribute is required',
            'stage_id.required' => 'stage_id attribute is required',           
            'user_id.required' => 'user_id attribute is required',          
            'order.required' => 'order attribute is required'           
        ];       
    }
}
