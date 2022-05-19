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
        // 1099
        if ($request->placement_type == '1099') {


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
                    // 'client_msa' => $clientmsaName,
                    // 'client_purchase_order' => $clientPurchaseOrderName,
                    // 'client_insurance' => $clientinsurranceName,
                    // 'vendor_msa' => $vendorMsaName,
                    // 'vendor_purchase_order' => $vendorPurchaseOrderName,
                    // 'vendor_insurance' => $vendorInsuranceName,
                    // 'vendor_w9' => $vendorW9Name,
                    // 'offer_letter_w2' => $offerLetterW2Name,
                    // 'w4_form_w2' => $w9FormW2Name,
                    // 'I9_form_w2' => $I9FormW2Name,
                    // 'e_verify_authorization_w2' => $everifyAuthorizationw2Name,
                    // 'ach_form_w2' => $achFormw2Name,
                    // 'void_check_w2' => $voidCheckw2Name,
                    // 'visa_copy_w2' => $visaCopyw2Name,
                    // 'id_proof_w2' => $idProofw2Name,
                ]
            );

            if ($update_company) {
                return '200';
            } else {
                return '201';
            }
        }
        // c2c
        if ($request->placement_type == 'c2c') {
            $clientmsa = $request->file('client_msa');
            $clientmsaName = $clientmsa->getClientOriginalName();
            $clientmsa->move(public_path('assets/upload/consultant/'), $clientmsaName);
            $clientmsaPath = "assets/upload/consultant/" . $clientmsaName;

            $clientPurchaseOrder = $request->file('client_purchase_order');
            $clientPurchaseOrderName = $clientPurchaseOrder->getClientOriginalName();
            $clientPurchaseOrder->move(public_path('assets/upload/consultant/'), $clientPurchaseOrderName);
            $clientPurchaseOrderPath = "assets/upload/consultant/" . $clientPurchaseOrderName;

            $clientinsurrance = $request->file('client_insurance');
            $clientinsurranceName = $clientinsurrance->getClientOriginalName();
            $clientinsurrance->move(public_path('assets/upload/consultant/'), $clientinsurranceName);
            $clientinsurrancePath = "assets/upload/consultant/" . $clientinsurranceName;

            $vendorMsa = $request->file('vendor_msa');
            $vendorMsaName = $vendorMsa->getClientOriginalName();
            $vendorMsa->move(public_path('assets/upload/consultant/'), $vendorMsaName);
            $vendorMsaPath = "assets/upload/consultant/" . $vendorMsaName;

            $vendorPurchaseOrder = $request->file('vendor_purchase_order');
            $vendorPurchaseOrderName = $vendorPurchaseOrder->getClientOriginalName();
            $vendorPurchaseOrder->move(public_path('assets/upload/consultant/'), $vendorPurchaseOrderName);
            $vendorPurchaseOrderPath = "assets/upload/consultant/" . $vendorPurchaseOrderName;

            $vendorInsurance = $request->file('vendor_insurance');
            $vendorInsuranceName = $vendorInsurance->getClientOriginalName();
            $vendorInsurance->move(public_path('assets/upload/consultant/'), $vendorInsuranceName);
            $vendorInsurancePath = "assets/upload/consultant/" . $vendorInsuranceName;

            $vendorW9 = $request->file('vendor_w9');
            $vendorW9Name = $vendorW9->getClientOriginalName();
            $vendorW9->move(public_path('assets/upload/consultant/'), $vendorW9Name);
            $vendorW9Path = "assets/upload/consultant/" . $vendorW9Name;

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
                    // 'offer_letter_1099' => $offerLetterName,
                    // 'w4_form_1099' => $w9FormName,
                    // 'I9_form_1099' => $I9FormName,
                    // 'ach_form_1099' => $achFormName,
                    // 'void_check_1099' => $voidCheckName,
                    // 'visa_copy_1099' => $visaCopyName,
                    // 'id_proof_1099' => $idProofName,
                    'client_msa' => $clientmsaName,
                    'client_purchase_order' => $clientPurchaseOrderName,
                    'client_insurance' => $clientinsurranceName,
                    'vendor_msa' => $vendorMsaName,
                    'vendor_purchase_order' => $vendorPurchaseOrderName,
                    'vendor_insurance' => $vendorInsuranceName,
                    'vendor_w9' => $vendorW9Name,
                    // 'offer_letter_w2' => $offerLetterW2Name,
                    // 'w4_form_w2' => $w9FormW2Name,
                    // 'I9_form_w2' => $I9FormW2Name,
                    // 'e_verify_authorization_w2' => $everifyAuthorizationw2Name,
                    // 'ach_form_w2' => $achFormw2Name,
                    // 'void_check_w2' => $voidCheckw2Name,
                    // 'visa_copy_w2' => $visaCopyw2Name,
                    // 'id_proof_w2' => $idProofw2Name,
                ]
            );

            if ($update_company) {
                return '200';
            } else {
                return '201';
            }
        }
        // w2
        if ($request->placement_type == 'w2') {
            $offerLetterW2 = $request->file('offer_latter_w2');
            $offerLetterW2Name = $offerLetterW2->getClientOriginalName();
            $offerLetterW2->move(public_path('assets/upload/consultant/'), $offerLetterW2Name);
            $offerLetterW2Path = "assets/upload/consultant/" . $offerLetterW2Name;

            $w9FormW2 = $request->file('w4_form_w2');
            $w9FormW2Name = $w9FormW2->getClientOriginalName();
            $w9FormW2->move(public_path('assets/upload/consultant/'), $w9FormW2Name);
            $w9FormW2Path = "assets/upload/consultant/" . $w9FormW2Name;

            $I9FormW2 = $request->file('i9_form_w2');
            $I9FormW2Name = $I9FormW2->getClientOriginalName();
            $I9FormW2->move(public_path('assets/upload/consultant/'), $I9FormW2Name);
            $I9FormW2Path = "assets/upload/consultant/" . $I9FormW2Name;

            $everifyAuthorizationw2 = $request->file('e_verify_authorization_w2');
            $everifyAuthorizationw2Name = $everifyAuthorizationw2->getClientOriginalName();
            $everifyAuthorizationw2->move(public_path('assets/upload/consultant/'), $everifyAuthorizationw2Name);
            $everifyAuthorizationw2Path = "assets/upload/consultant/" . $everifyAuthorizationw2Name;

            $achFormw2 = $request->file('ach_form_w2');
            $achFormw2Name = $achFormw2->getClientOriginalName();
            $achFormw2->move(public_path('assets/upload/consultant/'), $achFormw2Name);
            $achFormw2Path = "assets/upload/consultant/" . $achFormw2Name;

            $voidCheckw2 = $request->file('void_check_w2');
            $voidCheckw2Name = $voidCheckw2->getClientOriginalName();
            $voidCheckw2->move(public_path('assets/upload/consultant/'), $voidCheckw2Name);
            $voidCheckw2Path = "assets/upload/consultant/" . $voidCheckw2Name;

            $visaCopyw2 = $request->file('visa_copy_w2');
            $visaCopyw2Name = $visaCopyw2->getClientOriginalName();
            $visaCopyw2->move(public_path('assets/upload/consultant/'), $visaCopyw2Name);
            $visaCopyw2Path = "assets/upload/consultant/" . $visaCopyw2Name;

            $idProofw2 = $request->file('id_proof_w2');
            $idProofw2Name = $idProofw2->getClientOriginalName();
            $idProofw2->move(public_path('assets/upload/consultant/'), $idProofw2Name);
            $idProofw2Path = "assets/upload/consultant/" . $idProofw2Name;
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
                    // 'offer_letter_1099' => $offerLetterName,
                    // 'w4_form_1099' => $w9FormName,
                    // 'I9_form_1099' => $I9FormName,
                    // 'ach_form_1099' => $achFormName,
                    // 'void_check_1099' => $voidCheckName,
                    // 'visa_copy_1099' => $visaCopyName,
                    // 'id_proof_1099' => $idProofName,
                    // 'client_msa' => $clientmsaName,
                    // 'client_purchase_order' => $clientPurchaseOrderName,
                    // 'client_insurance' => $clientinsurranceName,
                    // 'vendor_msa' => $vendorMsaName,
                    // 'vendor_purchase_order' => $vendorPurchaseOrderName,
                    // 'vendor_insurance' => $vendorInsuranceName,
                    // 'vendor_w9' => $vendorW9Name,
                    'offer_letter_w2' => $offerLetterW2Name,
                    'w4_form_w2' => $w9FormW2Name,
                    'I9_form_w2' => $I9FormW2Name,
                    'e_verify_authorization_w2' => $everifyAuthorizationw2Name,
                    'ach_form_w2' => $achFormw2Name,
                    'void_check_w2' => $voidCheckw2Name,
                    'visa_copy_w2' => $visaCopyw2Name,
                    'id_proof_w2' => $idProofw2Name,
                ]
            );

            if ($update_company) {
                return '200';
            } else {
                return '201';
            }
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
