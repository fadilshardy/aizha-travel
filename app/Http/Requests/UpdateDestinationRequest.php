<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDestinationRequest extends FormRequest
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
            'name' => 'required|max:255',
            'description' => 'required',
            'slug' => 'sometimes|unique:destinations|max:255',
            'price' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'tags' => 'required',
            'images' => 'nullable'
        ];
    }
}
