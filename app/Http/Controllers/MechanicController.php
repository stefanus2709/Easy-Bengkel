<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mechanic;
use App\Models\Quotation;
use App\Models\SalaryDetail;
use Carbon\Carbon;

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
        $quotations = Quotation::where('mechanic_id', $id)->get();
        return view('mechanic.edit', compact('mechanic', 'quotations'));
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

    public function take_salary(Request $request, $id){
        $mechanic = Mechanic::findOrFail($id);

        $request->validate([
            'take' => 'required',
        ]);

        $mechanic->update([
            'salary' => $mechanic->salary - $request->take,
        ]);

        SalaryDetail::create([
            'mechanic_id' => $id,
            'time' => Carbon::now('Asia/Phnom_Penh'),
            'salary_taken' => $request->take,
        ]);

        return redirect('/mechanic')->with('success', 'Mechanic has been updated');
    }
}
