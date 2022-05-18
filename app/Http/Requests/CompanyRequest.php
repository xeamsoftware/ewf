<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'company_name' => 'required',
            'company_address' => 'required',
            'incorporation' => 'required',
            'federal_tax' => 'required',
            'authority_name' => 'required',
            'disignation' => 'required',
            'phone' => 'required|digits:10',
            'fax_no' => 'required',
            'company_email' => 'required|email',
            'account_name' => 'required',
            'account_email' => 'required|email',
            'account_phone' => 'required|digits:10',
            'sales_name' => 'required',
            'sales_email' => 'required|email',
            'sales_phone' => 'required|digits:10',
        ];
    }
}
