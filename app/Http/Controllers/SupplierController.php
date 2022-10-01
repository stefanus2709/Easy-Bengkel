<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){
        $suppliers = Supplier::all();
        return view('supplier.index', compact('suppliers'));
    }

    // public function create(){
    //     return view('supplier.create');
    // }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        Supplier::create([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect('/supplier');
    }

    // public function edit($id){
    //     $supplier = Supplier::findOrFail($id);
    //     return view('supplier.edit', compact('supplier'));
    // }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        Supplier::findOrFail($request->supplier_id)->update([
            'name' => $request->name,
            'company_name' => $request->company_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return redirect('/supplier');
    }

    public function delete(Request $request){
        Supplier::destroy($request->supplier_id);
        return back();
    }
}
