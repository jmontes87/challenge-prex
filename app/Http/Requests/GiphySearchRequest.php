<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GiphySearchRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'query' => 'required|string',
            'limit' => 'sometimes|integer',
            'offset' => 'sometimes|integer',
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
            'query' => [
                'description' => 'The search query for GIFs.',
                'example' => 'cute cats',
            ],
            'limit' => [
                'description' => 'The maximum number of results to be returned.',
                'example' => 10,
            ],
            'offset' => [
                'description' => 'The offset of search results.',
                'example' => 0,
            ],
        ];
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
