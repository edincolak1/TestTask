<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IssueTransferRequest extends FormRequest
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
<<<<<<< HEAD:app/Http/Requests/IssueTransferRequest.php
            'stage_id' => 'required',         
=======
            'stage_id' => 'filled',         
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34:app/Http/Requests/IssueTransferRequest.php
        ];

    }

    public function messages()
    {
        return [
         
<<<<<<< HEAD:app/Http/Requests/IssueTransferRequest.php
            'stage_id.required' => 'stage_id attribute is required',           
=======
            'stage_id.filled' => 'stage_id attribute must be filled',           
>>>>>>> 840a63e40ec6bc6b94c7ea7b883a9202f25c0c34:app/Http/Requests/IssueTransferRequest.php
                          
        ];       
    }

}
