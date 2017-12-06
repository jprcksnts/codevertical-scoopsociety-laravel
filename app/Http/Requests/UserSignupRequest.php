<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSignupRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'required|max:32',
            'email' => 'max:255',
            'username' => 'required|max:32',
            'firstname' => 'required|max:64',
            'lastname' => 'required|max:32',
            'gender' => 'max:8',
            'school_id' => 'required',
        ];
    }
}
