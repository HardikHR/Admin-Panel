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
            'city' => cityModel::with('state')->paginate(3)
        ]);
    }

    public function create()
    {
        return view('layouts.city.addCity',[
            'state' => stateModel::get()
        ]);
    }
    // Store a newly created resource in storage.

    public function store(Request $request)
    {
        $request->validate([
            'state_id'=>'required',
            'city_name'=>'required|unique:city',
            'city_code'=>'required|digits:2'
        ]);

        $city = new cityModel;
        $city->state_id = $request->state_id;
        $city->city_name = $request->city_name;
        $city->city_code = $request->city_code;
        $city->save();
        return redirect(route('layout.city'))->withSuccess('City create successfully !!!');
    }
    
    public function show(string $id)
    {
        return view('layouts.city.editCity',[
            'city' => cityModel::with('state')->get()
        ]);
    }

    public function edit(string $id)
    {        
        $city = cityModel::where('id',$id)->first();
        // return dd($city);
        return view('layouts.city.editCity', ['cityEdit' => $city]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'state_id' => 'required|',   
            'city_name' => 'required|unique:city',
            'city_code' => 'required',
        ]);
        
        $city = cityModel::Where('id', $id)->first();
        $city->state_id = $request->state_id;
        $city->city_code = $request->city_code;
        $city->city_name = $request->city_name;
        $city->save();
        // return dd($city);
        return redirect(route('layout.city'))->withSuccess('City update successfully !!!');
    }

    public function destroy(string $id)
    {
        $del_city = cityModel::where('id', $id)->first();
        try {
            $del_city->delete();
            return back()->withSuccess("$del_city->city_name ---> City Deleted Successfully !!!");
        } catch (Exception $e) {
            return redirect(route('layout.city'))->with('alert-danger', "error deleting  $del_city->name record");
        }
    }
}