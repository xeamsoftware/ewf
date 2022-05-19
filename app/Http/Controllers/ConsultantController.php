<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\Company;
use App\Models\Consultant;
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

    /**
     * list
     *
     * @return void
     */
    function list()
    {
        $consultant = Consultant::get();
        return view('consultant.list', compact('consultant'));
    }

    /**
     * view
     *
     * @param  mixed $id
     * @return void
     */
    function view($id)
    {
        $viewData = Consultant::where('id', $id)->get();
        return view('consultant.view', compact('viewData'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    function edit(consultant $id)
    {
        $editConsultant = Consultant::get();
        $placemenyType = Document::get();
        $company = Company::get();
        $agent = Agent::get();
        return view('consultant.edit', compact('id', 'editConsultant', 'placemenyType', 'company', 'agent'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    function update(Request $request, $id)
    {
        $message =  ConsultantService::consultantCreateUpdate($request, $id);
        if ($message == '200') {
            return redirect()->back()->with('success', "Update Company Successfull");
        } else {
            return redirect()->back()->with('unsuccess', 'Opps Something wrong!');
        }
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    function delete($id)
    {
        $deleteData = Consultant::where('id', $id)->Delete();
        if ($deleteData) {
            return redirect()->back()->with('success', ' deleted successfully.');
        } else {
            return redirect()->back()->with('unsuccess', 'Oops something wrong!');
        }
    }

    /**
     * changeStatus
     *
     * @param  mixed $request
     * @return void
     */
    public function changeStatus(Request $request)
    {
        $list = Consultant::find($request->list_id);
        $list->status = $request->status;
        $list->save();

        return response()->json(['success' => 'Status change successfully.']);
    }

    /**
     * filterStatus
     *
     * @param  mixed $request
     * @return void
     */
    public function filterStatus(Request $request)
    {
        $message = ConsultantService::filterStatusService($request);
        return Response($message);
    }
}
