<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class CreateShopRequest extends Request
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
        $owner_id = Request::input('owner_id'); //Get current merchant_id

        return [
           'name' => 'required',
           'email' =>  'required|email|max:255|unique:shops',
           'owner_id' => 'bail|required|composite_unique:shops,owner_id:'.$owner_id,
           'image' => 'max:' . config('system_settings.vendor_logo_max_size_limit_kb') . '|mimes:jpg,jpeg,png,gif',
        ];
    }

   /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'owner_id.composite_unique' => trans('validation.merchant_have_shop'),
            'image.max' => trans('validation.brand_logo_max'),
            'image.mimes' => trans('validation.brand_logo_mimes'),
        ];
    }
}
