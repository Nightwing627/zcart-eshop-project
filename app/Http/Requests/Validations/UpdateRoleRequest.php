<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class UpdateRoleRequest extends Request
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
        $shop_id = Request::user()->shop_id; //Get current user's shop_id
        $id = Request::segment(count(Request::segments())); //Current model ID

        return [
           'name' => 'bail|required|composite_unique:roles,shop_id:'.$shop_id.', '.$id,
           'public' => 'required',
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
            'public.required' => trans('validation.role_type_required'),
        ];
    }
}
