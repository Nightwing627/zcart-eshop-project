<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class UpdatePackagingRequest extends Request
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
            'name' => 'required',
            'cost' =>  'numeric|nullable',
            'image' => 'max:' . config('system_settings.vendor_logo_max_size_limit_kb') . '|mimes:jpg,jpeg,png,gif',
        ];
    }
}
