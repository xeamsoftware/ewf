<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\AgentRequest;
use App\Models\Agent;
use App\Services\AgentService;

class AgentController extends Controller
{
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('agent.create');
    }

    /**
     * save
     *
     * @param  mixed $request
     * @return void
     */
    public function save(AgentRequest $request)
    {
        $message = AgentService::agentCreateUpdate($request, $id = "");
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
        $agentList = Agent::get();
        return view('agent.list', compact('agentList'));
    }

    /**
     * view
     *
     * @param  mixed $id
     * @return void
     */
    function view($id)
    {
        $agentView = Agent::where('id', $id)->get();
        // $incentive_view = Incentive::where('id',$id)->onlyTrashed()->get();
        return view('agent.view', compact('id', 'agentView'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    function edit(agent $id)
    {
        $agentEdit = Agent::get();
        return view('agent.edit', compact('id', 'agentEdit'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    function update(AgentRequest $request, $id)
    {
        $message = AgentService::agentCreateUpdate($request, $id);
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
        $agentDelete = Agent::Where("id", $id)->Delete();
        if ($agentDelete) {
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
        $list = Agent::find($request->list_id);
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
        $message = AgentService::filterAgentService($request);
        return Response($message);
    }
}
