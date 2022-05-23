<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Consultant;
use App\Models\ConsultantDocument;
use Illuminate\Support\Facades\DB;

class ConsultantService
{
    /**
     * manipulateInput
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    static function consultantCreateUpdate($request, $id)
    {

        $ConsultantId = Consultant::updateOrCreate(
            [
                'id'   => $id
            ],
            [
                'placement_type' => $request->placement_type,
                'full_name' => $request->full_name,
                'location'   => $request->location,
                'work_authorization' => $request->work_authorization,
                'visa_expirary' => $request->visa_expiry,
                'contact_number'   => $request->conatct_number,
                'email' => $request->email,
                'ssn_number' => $request->ssn_number,
                'date_of_birth' => $request->date_of_birth,
                'condidate_rate' => $request->condidate_rate,
                'employee_name'   => $request->employer_name,
                'end_client_name' => $request->end_client_name,
                'end_client_address' => $request->end_client_address,
                'position_title' => $request->position_title,
                'start_date' => $request->start_date,
                'end_client_rate' => $request->end_client_rate,
                'through_company' => $request->through_company,
                'company_name'   => $request->company,
                'through_agent'   => $request->through_agent,
                'agent_name' => $request->agent,
                'placement_commission' => $request->commission,
                'commission_amount' => $request->amount,
                'internal_recruiter' => $request->internal_recuriter,

            ]
        )->id;

        foreach ($offerLetter = $request->file() as $key => $documents) {
            $doc = $request->file($key);
            $docName = $doc->getClientOriginalName();
            $doc->move(public_path('assets/upload/consultant/'), $docName);
            $docPath = "assets/upload/consultant/" . $docName;

            $task = new ConsultantDocument();
            $task->consultant_id = $ConsultantId;
            $task->documents = $docName;
            $task->save();
        }
        if ($ConsultantId) {
            return '200';
        } else {
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
        $output = "";
        $count = 0;
        if ($request->status == '') {
            $checkStatus = Consultant::get();
        } else {
            $checkStatus = Consultant::where('status', $request->status)->get();
        }
        if ($checkStatus) {
            foreach ($checkStatus as $statusList) {
                $count++;
                $output .= '<tr>' .
                    '<td>' . $count . '</td>' .
                    '<td>' . $statusList->placement_type . '</td>' .
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
                    '<a href="' . route('consultant.edit', $statusList->id) . '" class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>' .
                    '<a onclick="return myFunction();" href="' . route('consultant.delete', $statusList->id) . '" class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>' .
                    '<a class="btn btn-sm btn-secondary" href="' . route('consultant.view', $statusList->id) . '"><i class="fa fa-info-circle"></i> Details</a>' .
                    '</td>' .

                    '</tr>';
            }
        } else {
            $output .= 'Oops somthing went wrong';
        }
        return $output;
    }
}
