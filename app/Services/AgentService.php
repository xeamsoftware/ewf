<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agent;
use Illuminate\Support\Facades\DB;

class AgentService
{
    /**
     * manipulateInput
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    static function agentCreateUpdate($request, $id)
    {
        $update_incentive = Agent::updateOrCreate(
            [
                'id'   => $id
            ],
            [
                'account_type' => $request->account_type,
                'employee_id' => $request->employee_id,
                'full_name'   => $request->full_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'incentive_type' => $request->incentive_type,
                'flat_amount' => $request->flat_amount,
                'percentage'   => $request->percentage,
                'note' => $request->note,
            ]
        );

        if ($update_incentive) {
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
    static function filterAgentService($request)
    {
        $output = "";
        $count = 0;
        if ($request->status == '') {
            $checkStatus = Agent::get();
        } else {
            $checkStatus = Agent::where('status', $request->status)->get();
        }
        if ($checkStatus) {
            foreach ($checkStatus as $statusList) {
                $count++;
                $output .= '<tr>' .
                    '<td>' . $count . '</td>' .
                    '<td>' . $statusList->employee_id . '</td>' .
                    '<td>' . $statusList->full_name . '</td>' .
                    '<td>' . $statusList->email . '</td>' .
                    '<td>';
                if ($statusList->status == '1') {
                    $output .= '<label class="custom-switch">
                        <input type="checkbox" name="custom-switch-checkbox" data-id="' . $statusList->id . '" class="toggle-class status-btn custom-switch-input" checked>
                        <span class="custom-switch-indicator"></span>
                        </label>';
                } else {
                    $output .= '<label class="custom-switch">
                        <input type="checkbox" name="custom-switch-checkbox" data-id="' . $statusList->id . '" class="toggle-class status-btn custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                        </label>';
                }
                $output .= '</td>' .
                    '<td>' .
                    '<a href="' . route('agent.edit', $statusList->id) . '" class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>' .
                    '<a onclick="return myFunction();" href="' . route('agent.delete', $statusList->id) . '" class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>' .
                    '<a class="btn btn-sm btn-secondary" href="' . route('agent.view', $statusList->id) . '"><i class="fa fa-info-circle"></i> Details</a>' .
                    '</td>' .

                    '</tr>';
            }
        } else {
            $output .= 'Oops somthing went wrong';
        }
        return $output;
    }
}
