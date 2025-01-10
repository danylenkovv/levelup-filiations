<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreFiliationRequest extends Request
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
            'name' => 'required|string|max:255|unique:filiations,name',
            'photo_url' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'map' => 'string|max:300',
            'info' => 'required|string',
        ];
    }
}
