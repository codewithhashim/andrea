<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'image' => 'required|string',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'city' => 'required|string|max:100',
            'resume' => 'required|string',
            'languages' => 'required|array',
            'prev_job' => 'string',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */

    // public function messages()
    // {
    //     return [
    //         'first_name.required' => 'Email is required!',
    //         'last_name.required' => 'Name is required!',
    //         'password.required' => 'Password is required!'
    //     ];
    // }
}
