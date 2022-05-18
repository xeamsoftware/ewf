<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncentiveRequest extends FormRequest
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
            'name' => 'required',
            'from_amount' =>'required|numeric',
            'to_amount'    => 'required|numeric',
            'percentage' =>  'required|numeric|min:1|max:100',
        ];
    }
}
