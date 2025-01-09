<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateFiliationRequest extends Request
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
        $filiation = $this->route('filiation');

        return [
            'name' => 'required|string|max:255|unique:filiations,name,' . $filiation->id,
            'photo_url' => 'image|mimes:jpeg,png,jpg|max:2048',
            'map' => 'string|max:300',
            'info' => 'required|string',
        ];
    }
}
