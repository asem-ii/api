<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'title' => 'required|max:255|unique:courses',
            'description' => 'required',
            'cost' => 'required|max:10',
            'faculty' => 'required|max:35',
            'discount' => 'required|max:2',
            'year'=>'required|max:10'
        ];
    }
}
