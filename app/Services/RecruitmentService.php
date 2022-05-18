<?php

namespace App\services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Recruitment;
use Illuminate\Support\Facades\DB;

class RecruitmentService
{
    static function recruitmentCreateUpdate($request, $id)
    {
        $update_company = Recruitment::updateOrCreate(
            [
                'id'   => $id
            ],
            [
                'name' => $request->name,
                'email' => $request->email,
                'employee_code' => $request->employee_code,
                'phone_number'   => $request->phone_number,
                // 'status' => $request->status,               
                'note' => $request->note,
            ]
        );

        if ($update_company) {
            return '200';
        } else {
            return '201';
        }
    }
    static function filterrecruitmentService($request)
    {
        $output = "";
        $count = 0;
        if ($request->status == '') {
            $checkStatus = Recruitment::get();
        } else {
            $checkStatus = Recruitment::where('status', $request->status)->get();
        }
        if ($checkStatus) {
            foreach ($checkStatus as $statusList) {
                $count++;
                $output .= '<tr>' .
                    '<td>' . $count . '</td>' .
                    '<td>' . $statusList->name . '</td>' .
                    '<td>' . $statusList->email . '</td>' .
                    '<td>' . $statusList->employee_code . '</td>' .
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
                    '<a href="' . route('recruitment.edit', $statusList->id) . '" class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>' .
                    '<a onclick="return myFunction();" href="' . route('recruitment.delete', $statusList->id) . '" class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>' .
                    '<a class="btn btn-sm btn-secondary" href="' . route('recruitment.view', $statusList->id) . '"><i class="fa fa-info-circle"></i> Details</a>' .
                    '</td>' .

                    '</tr>';
            }
        } else {
            $output .= 'Oops somthing went wrong';
        }
        return $output;
    }
}
