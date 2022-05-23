<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use Illuminate\Support\Facades\DB;

class DocumentService
{
    /**
     * documentCreateUpdate
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    static function documentCreateUpdate($request, $id)
    {
        $update_document = Document::updateOrCreate(
            [
                'id'   => $id
            ],
            [
                'placementype_id' => $request->placementype_id,
                'type' => $request->field_name,
            ]
        );

        if ($update_document) {
            return back()->with('success', 'Successfull');
        } else {
            return back()->with('unsuccess', 'Opps Something wrong!');
        }
    }
}
