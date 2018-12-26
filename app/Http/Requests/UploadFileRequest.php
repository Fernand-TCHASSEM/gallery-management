<?php

namespace App\Http\Requests;

use Validator;
use App\Extensions\Requests\APIRequest;

class UploadFileRequest extends APIRequest
{

    private $mimeByValidator = [
        'image' => 'mimetypes:image/*',
        'audio' => 'mimetypes:audio/*',
        'video' => 'mimetypes:video/*'
    ];

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
            'files' => 'bail|required|array',
            'files.*' => 'bail|required|file'
        ];
    }

    public function validateByMime($mimeType)
    {
        $mimeType = strtolower($mimeType);

        $allowedMimeTypes = $this->mimeByValidator;

        if (\array_key_exists($mimeType, $allowedMimeTypes)) {

            $validator = Validator::make($this->all(), [
                'files.*' => $allowedMimeTypes[$mimeType]
            ]);
    
            if ($validator->fails()) {
                parent::failedValidation($validator);
            }
        } else {
            throw new \UnexpectedValueException('The mime type must be IMAGE, AUDIO, VIDEO.');
        }
    }
}
