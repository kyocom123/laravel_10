<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
        dd($this);
        if ($this->isMethod('POST')) {
            return [
                'username' => 'required|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|same:confirm-password',
                'roles' => 'required'
            ];     
        }

        if ($this->isMethod('PUT')) {
            return [
                'username' => 'required|unique:users,username',
                'email' => 'required|email|unique:users,email,'.$this->id,
                'password' => 'required|same:confirm-password',
                'roles' => 'required'
            ];     
        }
        // return [
        //     'username' => 'required|unique:users,username',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|same:confirm-password',
        //     'roles' => 'required'
        // ];
    }
}