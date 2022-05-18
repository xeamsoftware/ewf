<?php

namespace App\services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientService
{
    static function clientCreateUpdate($request, $id)
    {
        $update_company = Client::updateOrCreate(
            [
                'id'   => $id
            ],
            [
                'name' => $request->name,
                'email' => $request->email,
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
    static function filterClientService($request)
    {
        $output = "";
        $count = 0;
        if ($request->status == '') {
            $checkStatus = Client::get();
        } else {
            $checkStatus = Client::where('status', $request->status)->get();
        }
        if ($checkStatus) {
            foreach ($checkStatus as $statusList) {
                $count++;
                $output .= '<tr>' .
                    '<td>' . $count . '</td>' .
                    '<td>' . $statusList->name . '</td>' .
                    '<td>' . $statusList->email . '</td>' .
                    '<td>' . $statusList->phone_number . '</td>' .
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
                    '<a href="' . route('incentive.edit', $statusList->id) . '" class="btn btn-sm btn-primary" href="#"><i class="fa fa-edit"></i> Edit</a>' .
                    '<a onclick="return myFunction();" href="' . route('incentive.delete', $statusList->id) . '" class="btn btn-sm btn-danger" href="#"><i class="fa fa-trash"></i> Delete</a>' .
                    '<a class="btn btn-sm btn-secondary" href="' . route('incentive.view', $statusList->id) . '"><i class="fa fa-info-circle"></i> Details</a>' .
                    '</td>' .

                    '</tr>';
            }
        } else {
            $output .= 'Oops somthing went wrong';
        }
        return $output;
    }
}
