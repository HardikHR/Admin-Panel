<?php

namespace App\Http\Controllers;

use App\Models\cityModel;
use App\Models\stateModel;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;

class cityController extends MainController
{
    public function index()
    {
        return view('layouts.city',[
            'city' => cityModel::with('states')->get()
        ]);
    }

    public function create()
    {
        return view('layouts.city.addCity',[
            'city' => stateModel::get()
        ]);
    }
    // Store a newly created resource in storage.

    public function store(Request $request)
    {
        $request->validate([
            'state_id'=>'required',
            'name'=>'required|unique:city',
            'code'=>'required|digits:2'
        ]);

        $city = new cityModel;
        $city->state_id = $request->state_id;
        $city->name = $request->name;
        $city->code = $request->code;
        $city->save();
        return redirect(route('layout.city'))->withSuccess('City create successfully !!!');
    }
    
    public function show(string $id)
    {
        return view('layouts.city.editCity',[
            'city' => cityModel::with('states')->get()
        ]);
    }

    public function edit(string $id)
    {        
        $city = cityModel::with('states')->where('id', $id)->first();
        return view('layouts.city.editCity', ['cityEdit' => $city]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'state_id' => 'required|unique:city',   
            'code' => 'required',
            'name' => 'required',
        ]);

        $city = cityModel::Where('id', $id)->first();
        $city->state_id = $request->state_id;
        $city->code = $request->code;
        $city->name = $request->name;
        $city->save();
        // return dd($city);
        return redirect(route('layout.city'))->withSuccess('City update successfully !!!');
    }

    public function destroy(string $id)
    {
        $del_city = cityModel::where('id', $id)->first();
        try {
            $del_city->delete();
            return back()->withSuccess("$del_city->name ---> City Deleted Successfully !!!");
        } catch (Exception $e) {
            return redirect(route('layout.city'))->with('alert-danger', "Cannot delete this record ---> $del_city->name");
        }
    }
}