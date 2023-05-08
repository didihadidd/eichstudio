<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TalentRequest extends FormRequest
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
            'title' => 'required|max:255',
            'height' => 'required|max:255',
            'weight' => 'required|max:255',
            'status_hijab' => 'required|max:255',
            'schedule' => 'required|max:255',
            'price' => 'required|integer'
        ];
    }
}
