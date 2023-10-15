<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmSignupPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize()
    {
        return false;
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'confirmCode' => 'required',
            'userfirstName' => 'required',
            'userlastName' => 'required',
            'userOrgName' => 'required',
            'userEmail' => 'required',
            //'userpassword' => 'required', //not working with hash need to check
        ];
    }
}
