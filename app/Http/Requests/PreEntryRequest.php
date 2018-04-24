<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreEntryRequest extends FormRequest
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
            'full_name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'desired_at' => 'required',
            'salt_cave_id' => 'required',
            'type' => 'required',
            'confirmation' => 'required'
        ];
    }
}
