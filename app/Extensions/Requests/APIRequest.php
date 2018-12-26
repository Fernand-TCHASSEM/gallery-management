<?php

namespace App\Extensions\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Bases\Traits\ResponseErrorCodes;

abstract class APIRequest extends FormRequest
{

    use ResponseErrorCodes;

    /**
     * Determine if we should return the first or all validation messages
     *
     * @var bool
     */
    protected $firstError = false;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();

     /**
     * Force response json type when validation fails
     * @var bool
     */
    protected $forceJsonResponse = false; 

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
        $validationResponse = [
            'code' => self::$errorCodes['validation']
        ];

        $messages = $validator->errors()->getMessages();

        if ($this->firstError === true) {
            reset($messages);
            $firstKey = key($messages);
            $validationResponse['errors'][$firstKey] = $messages[$firstKey];
        } else {
            $validationResponse['errors'] = $messages;
        }
        throw new HttpResponseException(response()->json($validationResponse, 422));
    }

}