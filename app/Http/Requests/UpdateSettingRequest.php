<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateSettingRequest extends Request
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
            'logo_text' => 'required|string|max:255',
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string',
            'footer_text' => 'required|string|max:255',
        ];
    }
}
