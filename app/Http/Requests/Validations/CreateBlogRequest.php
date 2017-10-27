<?php

namespace App\Http\Requests\Validations;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogRequest extends FormRequest
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
           'title' => 'required',
           'excerpt' => 'required|max:555',
           'slug' => 'required|unique:blogs',
           'content' => 'required',
           'status' => 'required'
        ];
    }
}
