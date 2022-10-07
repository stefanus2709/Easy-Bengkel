<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{
    public function index(){
        $vehicle_types = VehicleType::all();
        return view('vehicle_type.index', compact('vehicle_types'));
    }

    public function create(){
        return view('vehicle_type.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:vehicle_types,name',
        ]);

        VehicleType::create([
            'name' => $request->name,
        ]);

        return redirect('/vehicle_type');
    }

    public function edit($id){
        $vehicle_type = VehicleType::findOrFail($id);
        return view('vehicle_type.edit', compact('vehicle_type'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:vehicle_types,name',
        ]);

        VehicleType::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        return redirect('/vehicle_type');
    }

    public function delete(Request $request){
        VehicleType::destroy($request->vehicle_type_id);
        return back();
    }
}
