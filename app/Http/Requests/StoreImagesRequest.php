<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImagesRequest extends FormRequest
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
            'title' => 'required|string|max:40',
            'description' => 'required|string|max:256',
            'category' => 'required|string|max:40|in:raid,achievement,transmog,event,other',
            'image' => 'required|mimes:jpeg,png|max:1014',
        ];
    }
}
