<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruitment;
use App\Services\RecruitmentService;

class Recruitmentcontroller extends Controller
{
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('recruitment.create');
    }

    /**
     * save
     *
     * @param  mixed $request
     * @return void
     */
    public function save(Request $request)
    {
        $message = RecruitmentService::recruitmentCreateUpdate($request, $id = "");
        if ($message == '200') {
            return redirect()->back()->with('success', 'Data save successfull');
        } else {
            return redirect()->back()->with('unsuccess', 'Opps Something wrong!');
        }
    }

    /**
     * list
     *
     * @return void
     */
    public function list()
    {
        $recruitmentList = Recruitment::get();
        return view('recruitment.list', compact('recruitmentList'));
    }

    /**
     * view
     *
     * @param  mixed $id
     * @return void
     */
    function view($id)
    {
        $recruitmentView = Recruitment::where('id', $id)->get();
        // $incentive_view = Incentive::where('id',$id)->onlyTrashed()->get();
        return view('recruitment.view', compact('id', 'recruitmentView'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    function edit(recruitment $id)
    {
        $recruitmentEdit = Recruitment::get();
        return view('recruitment.edit', compact('id', 'recruitmentEdit'));
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
        $message = RecruitmentService::recruitmentCreateUpdate($request, $id);
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
        $RecruitmentDelete = Recruitment::Where("id", $id)->Delete();
        if ($RecruitmentDelete) {
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
        $list = Recruitment::find($request->list_id);
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
        $message = RecruitmentService::filterrecruitmentService($request);
        return Response($message);
    }
}
