<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class CreateCountryRequest extends Request
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
           'name' => 'required|string',
           'full_name' => 'required|string',
           'iso_3166_2' => 'required|size:2|unique:countries',
           'iso_3166_3' => 'required|size:3|unique:countries',
           'iso_numeric' => 'required|max:3|unique:countries',
           'eea' => 'required',
           'active' => 'required',
        ];
    }
}
