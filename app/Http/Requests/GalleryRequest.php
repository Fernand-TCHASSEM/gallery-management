<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Extensions\Requests\APIRequest;

class GalleryRequest extends APIRequest
{

    protected $firstError = true;

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
        $verb = $this->method();

        if ($verb === 'POST') {
            return [
                'name' => 'bail|required|string|max:100|unique:galleries,name',
                'description' => 'bail|string',
                'pictures' => 'bail|required|array',
                'pictures.*' => 'bail|required|base64image'
            ];
        } elseif ($verb === 'PUT') {
            $id = $this->route('gallery');
            $this->merge(['id' => $id]);

            return [
                'id' => 'bail|required|exists:galleries,id',
                'name' => ['bail', 'sometimes', 'required', 'string', 'max:100', Rule::unique('galleries')->ignore($id), ],
                'description' => 'bail|sometimes|string',
                'pictures' => 'bail|required|array',
                'pictures' => 'bail|required|array',
                'pictures.*' => 'bail|required|base64image'
            ];
        } elseif ($verb === 'DELETE') {
            $id = $this->route('gallery');
            $this->merge(['id' => $id]);

            return [
                'id' => 'bail|required|string|exists:galleries,id'
            ];
        } else {
            return [
                //
            ];
        }
    }
}
