<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
{
    public $table = "galleries";
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
            'talents_id' => 'required|integer|exists:talents,id', //data id travel_packages_id memang ada di tabel travel_packages
            'image' => 'required|image',
        ];
    }
}
