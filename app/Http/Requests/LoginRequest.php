<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required',
        ];
    }

        /**
     * Get the body parameters for the request.
     *
     * @return array
     */
    public function bodyParameters()
    {
        return [
            'email' => [
                'description' => 'The email address of the user.',
                'example' => 'john@example.com',
            ],
            'password' => [
                'description' => 'The password of the user.',
                'example' => 'secret',
            ],
        ];
    }

    /**
     * Handle a passed validation attempt.
     *
     * @return void
     */
    protected function passedValidation()
    {
        $credentials = $this->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            $this->failedAuthorization();
        }
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     */
    public function failedAuthorization()
    {
        throw new HttpResponseException(response()->json(['error' => 'Unauthorized - review email or password'], 401));
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['error' => $validator->errors()->toArray()], 422));
    }
}
