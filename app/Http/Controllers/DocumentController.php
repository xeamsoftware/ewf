<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Services\DocumentService;

class DocumentController extends Controller
{    

    protected $DocumentService;
    /**
     * create
     *view create document page
     * @return void
     */
    function create()
    {
        return view('document.create');
    }
    
    /**
     * save
     *
     * @param  mixed $request
     * @return void
     */
    function save(DocumentRequest $request)
    {
        DocumentService::documentCreateUpdate($request,$id = "");
        return redirect()->back();
    }
    
    /**
     * list
     *show all document list 
     * @return void
     */
    function list()
    {
        $document_list = Document::get();
        return view('document.list',compact('document_list'));
    }
    
    /**
     * edit document 
     *
     * @param  mixed $id
     * @return void
     */
    function edit(document $id)
    {
        $edit_document = Document::get();
        return view('document.edit',compact('id','edit_document'));

    }

    
    /**
     * update document
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    function update(Request $request,$id)
    {
        DocumentService::documentCreateUpdate($request,$id);
        return redirect()->back();
    }
        
    /**
     * view specific files 
     *
     * @param  mixed $id
     * @return void
     */
    function view($id)
    {
        $document_view = Document::where('id',$id)->get();
        return view('document.view',compact('document_view'));
    }

    function delete($id)
    {
        $document_delete = Document::Where("id",$id)->Delete();
        if($document_delete) {
            return redirect()->back()->with('success',' deleted successfully.');
        }else{
            return redirect()->back()->with('unsuccess','Oops something wrong!');
        }
    }
}
