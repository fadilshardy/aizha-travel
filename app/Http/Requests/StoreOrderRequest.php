<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'destination_id' => 'required|exists:destinations,id',
            'quantity' => 'required',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:today',
            'total_amount' => 'required',
            'total_days' => 'required',
            'notes' => 'nullable',
        ];
    }
}
