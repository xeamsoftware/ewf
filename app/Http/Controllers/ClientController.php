<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Services\ClientService;

class ClientController extends Controller
{
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * save
     *
     * @param  mixed $request
     * @return void
     */
    public function save(ClientRequest $request)
    {
        $message = ClientService::clientCreateUpdate($request, $id = "");
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
    public function list()
    {
        $client_list = Client::get();
        return view('client.list', compact('client_list'));
    }

    /**
     * view
     *
     * @param  mixed $id
     * @return void
     */
    public function view($id)
    {
        $client_view = Client::where('id', $id)->get();
        // $incentive_view = Incentive::where('id',$id)->onlyTrashed()->get();
        return view('client.view', compact('id', 'client_view'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return void
     */
    function edit(client $id)
    {
        $client_edit = Client::get();
        return view('client.edit', compact('id', 'client_edit'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    function update(ClientRequest $request, $id)
    {
        $message = ClientService::clientCreateUpdate($request, $id);
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
        $ClientDelete = Client::Where("id", $id)->Delete();
        if ($ClientDelete) {
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
        $list = Client::find($request->list_id);
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
        $message = ClientService::filterClientService($request);
        return Response($message);
    }
}
