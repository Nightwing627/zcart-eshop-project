<?php

namespace App\Http\Requests\Validations;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogRequest extends FormRequest
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
        $id = FormRequest::segment(count(FormRequest::segments())); //Current model ID
        return [
           'title' => 'required',
           'excerpt' => 'required|max:555',
           'slug' =>  'required|unique:blogs,slug,'.$id,
           'content' => 'required',
           'status' => 'required'
        ];
    }
}
