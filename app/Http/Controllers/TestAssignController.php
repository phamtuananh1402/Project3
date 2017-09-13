<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Validator;

class TestAssignController extends Controller
{


    public function editItem(Request $req)
    {
        $data = Data::find($req->id);
        $data->name = $req->name;
        $data->save();
        return response()->json($data);
    }

    public function readItems(Request $req)
    {
        $data = Data::all();
        return view('welcome')->withData($data);
    }

    public function addItem(Request $request)
    {
        $rules = array(
            'name' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array(

                'errors' => $validator->getMessageBag()->toArray()
            ));
        else {
            $data = new Data ();
            $data->name = $request->name;
            $data->save();
            return response()->json($data);
        }
    }
}
