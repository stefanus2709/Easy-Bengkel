<?php

namespace App\Http\Controllers;

use App\Models\PurchaseIn;
use App\Models\PurchaseInDetail;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseInController extends Controller
{
    public function index(){
        $po_ins = PurchaseIn::orderBy('created_at', 'DESC')->get();
        $suppliers = Supplier::all();
        return view('po_in.index', compact('po_ins', 'suppliers'));
    }

    public function create(){
        return view('po_in.create', compact('suppliers'));
    }

    public function store(Request $request){
        $request->validate([
            'supplier_id' => 'required',
            'date' => 'required',
        ]);

        PurchaseIn::create([
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
            'total_price' => 0,
            'finalized' => 0,
        ]);

        $last_po = PurchaseIn::orderBy('created_at', 'desc')->first();

        return redirect('/po_in/edit/'.$last_po->id)->with('success', 'Purchase has been created');
    }

    public function edit($id){
        $po_in = PurchaseIn::findOrFail($id);
        $suppliers = Supplier::all();
        return view('po_in.edit', compact('po_in', 'suppliers'));
    }

    public function update(Request $request, $po_id){
        $request->validate([
            'supplier_id' => 'required',
            'date' => 'required',
        ]);

        PurchaseIn::findOrFail($po_id)->update([
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
        ]);

        return redirect('/po_in');
    }

    public function delete(Request $request){
        PurchaseIn::destroy($request->po_in_id);
        return back();
    }

    public function finalize($id){
        $po_in = PurchaseIn::findOrFail($id);
        $po_details = PurchaseInDetail::where('purchase_in_id', $id)->get();
        $total_price = 0;

        if(count($po_details) == 0){
            return redirect('/po_in/edit/'.$po_in->id)->with('failed', 'Cannot finalize, there is no item to stock!');
        }

        foreach ($po_details as $detail) {
            $detail->product->update([
                'quantity' => $detail->product->quantity + $detail->quantity,
            ]);
            $total_price += $detail->quantity * $detail->price;
        }

        $po_in->update([
            'total_price' => $total_price,
            'finalized' => 1,
        ]);

        return redirect('/po_in');
    }

    public function purchase_this_month(){
        $total_purchases = PurchaseIn::orderBy('created_at', 'DESC')->whereMonth('date', now()->month)->where('finalized', true)->get();
        return view('po_in.this_month', compact('total_purchases'));
    }
}
