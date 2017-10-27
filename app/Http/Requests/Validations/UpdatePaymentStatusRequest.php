<?php

namespace App\Http\Requests\Validations;

use App\Http\Requests\Request;

class UpdatePaymentStatusRequest extends Request
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
           'email_template_id' => 'required_if:send_email_to_customer,1',
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
            'email_template_id.required_if' => trans('validation.email_template_id_required'),
        ];
    }

}
