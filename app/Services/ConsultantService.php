<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Consultant;
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
        print_r($request->all());
        die;
        // 1099
        $offerLetter = $request->file('offer_latter_1099');
        $offerLetterName = $offerLetter->getClientOriginalName();
        $offerLetter->move(public_path('assets/upload/consultant/'), $offerLetterName);
        $offerLetterPath = "assets/upload/consultant/" . $offerLetterName;

        $w9Form = $request->file('w9_form_1099');
        $w9FormName = $w9Form->getClientOriginalName();
        $w9Form->move(public_path('assets/upload/consultant/'), $w9FormName);
        $w9FormPath = "assets/upload/consultant/" . $w9FormName;

        $I9Form = $request->file('i9_form_1099');
        $I9FormName = $I9Form->getClientOriginalName();
        $I9Form->move(public_path('assets/upload/consultant/'), $I9FormName);
        $I9FormPath = "assets/upload/consultant/" . $I9FormName;

        $achForm = $request->file('ach_form_1099');
        $achFormName = $achForm->getClientOriginalName();
        $achForm->move(public_path('assets/upload/consultant/'), $achFormName);
        $achFormPath = "assets/upload/consultant/" . $achFormName;

        $voidCheck = $request->file('void_check_1099');
        $voidCheckName = $voidCheck->getClientOriginalName();
        $voidCheck->move(public_path('assets/upload/consultant/'), $voidCheckName);
        $voidCheckPath = "assets/upload/consultant/" . $voidCheckName;

        $visaCopy = $request->file('visa_copy_1099');
        $visaCopyName = $visaCopy->getClientOriginalName();
        $visaCopy->move(public_path('assets/upload/consultant/'), $visaCopyName);
        $visaCopyPath = "assets/upload/consultant/" . $visaCopyName;

        $idProof = $request->file('id_proof_1099');
        $idProofName = $idProof->getClientOriginalName();
        $idProof->move(public_path('assets/upload/consultant/'), $idProofName);
        $idProofPath = "assets/upload/consultant/" . $idProofName;

        // c2c
        $clientmsa = $request->file('client_msa');
        $clientmsaName = $clientmsa->getClientOriginalName();
        $clientmsa->move(public_path('assets/upload/consultant/'), $clientmsaName);
        $clientmsaPath = "assets/upload/consultant/" . $clientmsaName;

        $clientPurchaseOrder = $request->file('client_purchase_order');
        $clientPurchaseOrderName = $clientPurchaseOrder->getClientOriginalName();
        $clientPurchaseOrder->move(public_path('assets/upload/consultant/'), $clientPurchaseOrderName);
        $clientPurchaseOrderPath = "assets/upload/consultant/" . $clientPurchaseOrderName;

        $update_company = Consultant::updateOrCreate(
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
                'offer_letter_1099' => $offerLetterName,
                'w4_form_1099' => $w9FormName,
                'I9_form_1099' => $I9FormName,
                'ach_form_1099' => $achFormName,
                'void_check_1099' => $voidCheckName,
                'visa_copy_1099' => $visaCopyName,
                'id_proof_1099' => $idProofName,

                'client_msa' => $clientmsaName,
                'client_purchase_order' => $clientPurchaseOrderName,
                'client_insurance' => $w9FormName,
                'vendor_msa' => $I9FormName,
                'vendor_purchase_order' => $achFormName,
                'vendor_insurance' => $voidCheckName,
                'vendor_w9' => $visaCopyName,
            ]
        );

        if ($update_company) {
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
                    '<td>' . $statusList->company_name . '</td>' .
                    '<td>' . $statusList->phone . '</td>' .
                    '<td>' . $statusList->disignation . '</td>' .
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
                    '<a href="' . route('company.edit', $statusList->id) . '" class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>' .
                    '<a onclick="return myFunction();" href="' . route('company.delete', $statusList->id) . '" class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>' .
                    '<a class="btn btn-sm btn-secondary" href="' . route('company.view', $statusList->id) . '"><i class="fa fa-info-circle"></i> Details</a>' .
                    '</td>' .

                    '</tr>';
            }
        } else {
            $output .= 'Oops somthing went wrong';
        }
        return $output;
    }
}
