<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Incentive;
use Illuminate\Support\Facades\DB;

class IncentiveService
{        
    /**
     * manipulateInput
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    static function incentiveCreateUpdate($request,$id)
    {
        $update_incentive = Incentive::updateOrCreate([
                'id'   =>$id
            ],
        [
            'name' => $request->name,
            'from' => $request->from_amount,
            'to'   => $request->to_amount,
            'percentage' => $request->percentage,
            // 'status' => $request->status,
            'incentive_note' => $request->note,
        ]);

        if($update_incentive){
            return '200'; 
         } else {
              return '201';
         }
    }

    
    /**
     * filterStatusService
     *
     * @param  mixed $request
     * @return void
     */
    static function filterIncentiveService($request)
    {
        $output="";
        $count = 0;
        if($request->status == ''){
            $checkStatus = Incentive::get();
        }else{
            $checkStatus = Incentive::where('status',$request->status)->get();
        }        
        if($checkStatus){
            foreach($checkStatus as $statusList)
            {                               
                $count++;
                $output.='<tr>'.
                '<td>'.$count.'</td>'.
                '<td>'.$statusList->name.'</td>'.
                '<td>'.$statusList->from.'</td>'.
                '<td>'.$statusList->to.'</td>'.              
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
                    '<a href="'.route('incentive.edit',$statusList->id).'" class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>'.
                    '<a onclick="return myFunction();" href="'. route('incentive.delete',$statusList->id).'" class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>'.
                    '<a class="btn btn-sm btn-secondary" href="'.route('incentive.view',$statusList->id) .'"><i class="fa fa-info-circle"></i> Details</a>'.
                '</td>'.

                '</tr>';
            }
        }else{
            $output.='Oops somthing went wrong';
        }
        return $output;
    }
}