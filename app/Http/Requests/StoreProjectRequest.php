<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|min:3',
            'image'=> 'required',
            'link' => 'required',
            'type_id' => 'required',
            'technologies' => 'nullable|exists:technologies,id'
        ];
    }

    public function messages()
    {
        return [
                'name.required' => "You must add a name",
                'name.max' => "name is longer than 255",
                'name.min' => "name is shorter than 3",
                'image.required' => "You must add a image",
                'link.required' => "You must add a link"
        ];
    }
}
