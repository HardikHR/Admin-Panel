<?php

namespace App\Http\Controllers;

use App\Models\stateModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;

class stateController extends MainController
{

    public function index()
    {
        return view('layouts.index', [
            'states' => stateModel::latest()->paginate(3)
        ]);
    }

    public function create()
    {
        return view('layouts.state.addState');
    }

    public function store(Request $request)
    {
        //Validation 
        $request->validate([
            'name' => 'required|unique:states',
            'code' => 'required',
        ]);

        $state = new stateModel;
        $state->name = $request->name;
        $state->code = $request->code;
        $state->save();
        return redirect(route('layout.state'))->withSuccess('State created successfully !!!');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
        $st = stateModel::where('id', $id)->first();
        return view('layouts.state.editState', ['stateEdit' => $st]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:states',
            'code' => 'required',
        ]);

        $prods = stateModel::Where('id', $id)->first();
        $prods->name = $request->name;
        $prods->code = $request->code;
        $prods->save();
        return redirect(route('layout.state'))->withSuccess('State updated successfully !!!');
    }

    public function destroy(string $id)
    {
        $del_state = stateModel::where('id', $id)->first();
        try {
            $del_state->delete();
            return back()->withSuccess("$del_state->name ---> State Deleted Successfully !!!");
        } catch (Exception $e) {
            return redirect(route('layout.state'))->with('alert-danger', "Cannot delete this record ---> $del_state->name");
        }
    }
}