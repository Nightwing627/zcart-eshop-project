<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ExportRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->user()->isFromPlatform()){
            return true;
        }
        else{
            echo "<pre>"; print_r($this->all()); echo "</pre>"; exit();
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
