<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index(){
        $pos = PurchaseOrder::orderBy('created_at', 'DESC')->get();
        $suppliers = Supplier::all();
        return view('po.index', compact('pos', 'suppliers'));
    }

    public function create(){
        return view('po.create', compact('suppliers'));
    }

    public function store(Request $request){
        $request->validate([
            'supplier_id' => 'required',
            'date' => 'required',
        ]);

        PurchaseOrder::create([
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
            'total_price' => 0,
            'finalized' => false,
        ]);

        $last_po = PurchaseOrder::orderBy('created_at', 'desc')->first();

        return redirect('/po/edit/'.$last_po->id)->with('success', 'PO has been created');
    }

    public function edit($id){
        $po = PurchaseOrder::findOrFail($id);
        $suppliers = Supplier::all();
        return view('po.edit', compact('po', 'suppliers'));
    }

    public function update(Request $request, $po_id){
        $request->validate([
            'supplier_id' => 'required',
            'date' => 'required',
        ]);

        PurchaseOrder::findOrFail($po_id)->update([
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
        ]);

        return redirect('/po/edit/'.$po_id)->with('success', 'PO has been updated');
    }

    public function delete(Request $request){
        PurchaseOrder::destroy($request->po_id);
        return back()->with('failed', 'PO has been deleted');
    }

    public function finalize($id){
        $po = PurchaseOrder::findOrFail($id);
        $po_details = PurchaseOrderDetail::where('purchase_order_id', $id)->get();
        $total_price = 0;

        if(count($po_details) == 0){
            return redirect('/po/edit/'.$po->id)->with('failed', 'Cannot finalize, there is no item to stock!');
        }

        foreach ($po_details as $detail) {
            $detail->product->update([
                'quantity' => $detail->product->quantity + $detail->quantity,
            ]);
            $total_price += $detail->quantity * $detail->price;
        }

        $po->update([
            'total_price' => $total_price,
            'finalized' => true,
        ]);

        return redirect('/po')->with('success', 'PO has been finalized');
    }

    public function purchase_this_month(){
        $total_purchases = PurchaseOrder::orderBy('created_at', 'DESC')->whereMonth('date', now()->month)->where('finalized', true)->get();
        return view('po.purchase_this_month', compact('total_purchases'));
    }
}
