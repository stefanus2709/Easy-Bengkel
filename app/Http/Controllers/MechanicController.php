<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mechanic;

class MechanicController extends Controller
{
    public function index(){
        $mechanics = Mechanic::all();
        return view('mechanic.index', compact('mechanics'));
    }

    // public function create(){
    //     return view('mechanic.create');
    // }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        Mechanic::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect('/mechanic')->with('success', 'Mechanic has been created');
    }

    public function edit($id){
        $mechanic = Mechanic::findOrFail($id);
        return view('mechanic.edit', compact('mechanic'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        Mechanic::findOrFail($id)->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect('/mechanic')->with('success', 'Mechanic has been updated');
    }

    public function delete(Request $request){
        Mechanic::destroy($request->mechanic_id);
        return back();
    }
}
