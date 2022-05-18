<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use Illuminate\Support\Facades\DB;

class CompanyService
{        
    /**
     * manipulateInput
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    static function companyCreateUpdate($request,$id)
    {
        $update_company = Company::updateOrCreate([
                'id'   =>$id
            ],
        [
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'incorporation'   => $request->incorporation,
            // 'status' => $request->status,
            'federal_tax' => $request->federal_tax,
            'authority_name' => $request->authority_name,
            'disignation' => $request->disignation,
            'phone'   => $request->phone,
            'fax_no' => $request->fax_no,
            'company_email' => $request->company_email,
            'account_name' => $request->account_name,
            'account_email' => $request->account_email,
            'account_phone'   => $request->account_phone,
            'sales_name' => $request->sales_name,
            'sales_email' => $request->sales_email,
            'sales_phone' => $request->sales_phone,
            'note' => $request->note,            
        ]);

        if($update_company){
            return '200'; 
        }else {
              return '201';
        }
    }

    
    /**
     * filterStatus
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    static function filterStatusService($request)
    {
        $output="";
        $count = 0;
        if($request->status == ''){
            $checkStatus = Company::get();
        }else{
            $checkStatus = Company::where('status',$request->status)->get();
        }        
        if($checkStatus){
            foreach($checkStatus as $statusList)
            {                               
                $count++;
                $output.='<tr>'.
                '<td>'.$count.'</td>'.
                '<td>'.$statusList->company_name.'</td>'.
                '<td>'.$statusList->phone.'</td>'.
                '<td>'.$statusList->disignation.'</td>'.              
                '<td>';
                    if($statusList->status == '1'){
                        $output.='<label class="custom-switch">
                        <input type="checkbox" name="custom-switch-checkbox" data-id="'.$statusList->id.'" class="toggle-class status-btn custom-switch-input" checked>
                        <span class="custom-switch-indicator"></span>
                        </label>';
                    }else{
                        $output.='<label class="custom-switch">
                        <input type="checkbox" name="custom-switch-checkbox" data-id="'.$statusList->id.'" class="toggle-class status-btn custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                        </label>';                    }
                $output.='</td>'.
                '<td>'.
                    '<a href="'.route('company.edit',$statusList->id).'" class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>'.
                    '<a onclick="return myFunction();" href="'. route('company.delete',$statusList->id).'" class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>'.
                    '<a class="btn btn-sm btn-secondary" href="'.route('company.view',$statusList->id) .'"><i class="fa fa-info-circle"></i> Details</a>'.
                '</td>'.

                '</tr>';
            }
        }else{
            $output.='Oops somthing went wrong';
        }
        return $output;
    }
}