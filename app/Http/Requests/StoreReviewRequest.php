<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;



class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * 
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
            'user_id' => 'required|exists:users,id',
            'destination_id' => 'required|exists:destinations,id',
            'rating' => 'required|integer|between:1,5',
            'review' => 'required|string|min:10|max:64',
        ];
    }

    protected function getRedirectUrl()
    {
        return parent::getRedirectUrl() . '#review';
    }
}
