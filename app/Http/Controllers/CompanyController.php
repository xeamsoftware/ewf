<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;

class CompanyController extends Controller
{
    /**
     * create
     * show company create page 
     * @return void
     */
    function create()
    {
        return view('company.create');
    }

    /**
     * save
     * save and update of company data
     * @param  mixed $request
     * @return void
     */
    function save(CompanyRequest $request)
    {
        $message = CompanyService::companyCreateUpdate($request, $id = "");
        if ($message == '200') {
            return redirect()->back()->with('success', "Create Company Successfull");
        } else {
            return redirect()->back()->with('unsuccess', 'Opps Something wrong!');
        }
    }

    /**
     * list
     * show all list of company data
     * @return void
     */
    function list()
    {
        $companyData = Company::get();
        return view('company.list', compact('companyData'));
    }

    /**
     * view 
     * show single specific list of company
     * @param  mixed $id
     * @return void
     */
    function view($id)
    {
        $viewData = Company::where('id', $id)->get();
        return view('company.view', compact('viewData'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    function edit(company $id)
    {
        $companyEdit = Company::get();
        return view('company.edit', compact('id', 'companyEdit'));
    }

    /**
     * update company list
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    function update(CompanyRequest $request, $id)
    {
        $message = CompanyService::companyCreateUpdate($request, $id);
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
        $deleteData = Company::where('id', $id)->Delete();
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
        $list = Company::find($request->list_id);
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
        $message = CompanyService::filterStatusService($request);
        return Response($message);
    }
}
