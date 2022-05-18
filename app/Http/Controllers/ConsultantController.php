<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\Company;
use App\Models\Agent;
use App\Services\ConsultantService;

class ConsultantController extends Controller
{
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $placemenyType = Document::get();
        $company = Company::get();
        $agent = Agent::get();
        return view('consultant.create', compact('placemenyType', 'company', 'agent'));
    }

    /**
     * save
     *
     * @param  mixed $request
     * @return void
     */
    function save(Request $request)
    {
        $message = ConsultantService::consultantCreateUpdate($request, $id = "");
        if ($message == '200') {
            return redirect()->back()->with('success', "Create Company Successfull");
        } else {
            return redirect()->back()->with('unsuccess', 'Opps Something wrong!');
        }
    }
}
