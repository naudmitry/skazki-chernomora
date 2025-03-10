<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            'title' => 'required|string',
            'name' => 'required|string',
            'image_link' => 'sometimes|url',
            'category_id' => 'required|integer',
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
        ];
    }
}
