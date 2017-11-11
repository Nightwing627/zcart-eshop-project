<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class CreatePackagingRequest extends Request
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
        Request::merge( array( 'shop_id' => Request::user()->shop_id ) ); //Set shop_id

        return [
            'name' => 'required',
            'cost' => 'numeric|nullable',
            'image' => 'max:' . config('system_settings.merchant_logo_max_size_limit_kb') ?:'1024' . '|mimes:jpg,jpeg,png,gif',
        ];
    }
}
