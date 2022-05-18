<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \App\Http\Requests\IncentiveRequest;
use App\Models\Incentive;
use App\Services\IncentiveService;

class IncentiveController extends Controller
{

    protected $IncentiveService;

    /**
     * create
     *Show the incentive create.
     * @return void
     */
    function create()
    {
        return view('incentive.create');
    }

    /**
     * save
     * save incentive data
     * @param  mixed $request
     * @return void
     */
    function save(IncentiveRequest $request)
    {
        $message = IncentiveService::incentiveCreateUpdate($request, $id = "");
        if ($message == '200') {
            return redirect()->back()->with('success', 'Data save successfull');
        } else {
            return redirect()->back()->with('unsuccess', 'Opps Something wrong!');
        }
    }


    /**
     * list
     *show all incentive list
     * @return void
     */
    function list()
    {
        $incentive_list = Incentive::get();
        // $incentive_list = Incentive::onlyTrashed()->get();
        return view('incentive.list', compact('incentive_list'));
    }

    /**
     * view
     *show single view data of specific id
     * @param  mixed $id
     * @return void
     */
    function view($id)
    {
        $incentive_view = Incentive::where('id', $id)->get();
        // $incentive_view = Incentive::where('id',$id)->onlyTrashed()->get();
        return view('incentive.view', compact('id', 'incentive_view'));
    }

    /**
     * edit
     *edit specific incentive data
     * @param  mixed $id
     * @return void
     */
    function edit(incentive $id)
    {
        $incentive_edit = Incentive::get();
        return view('incentive.edit', compact('id', 'incentive_edit'));
    }

    /**
     * update
     *incentive update
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    function update(IncentiveRequest $request, $id)
    {
        $message = IncentiveService::incentiveCreateUpdate($request, $id);
        if ($message == '200') {
            return redirect()->back()->with('success', 'Data update successfull');
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
        $Incentive_Delete = Incentive::Where("id", $id)->Delete();
        if ($Incentive_Delete) {
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
        $list = Incentive::find($request->list_id);
        $list->status = $request->status;
        $list->save();

        return response()->json(['success' => 'Status change successfully.']);
    }


    /**
     * incentiveFilter
     *
     * @param  mixed $request
     * @return void
     */
    public function filterStatus(Request $request)
    {
        $message = IncentiveService::filterIncentiveService($request);
        return Response($message);
    }
}
