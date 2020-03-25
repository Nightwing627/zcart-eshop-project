<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class UpdateCountryRequest extends Request
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
        $rules = [
          'name' => 'required|string',
          'full_name' => 'required|string',
          'eea' => 'required',
          'active' => 'required',
        ];

        $country = $this->route('country');

        if(! $country->iso_3166_2)
           $rules['iso_3166_2'] = 'required|size:3|unique:countries';

        if(! $country->iso_3166_3)
           $rules['iso_3166_3'] = 'required|size:3|unique:countries';

        if(! $country->iso_numeric)
           $rules['iso_numeric'] = 'required|max:3|unique:countries';

        return $rules;
    }
}
