<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderDetail;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseOrderDetailController extends Controller
{
    public function create(){

    }

    public function store(Request $request, $po_id){
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);
        $curr_detail = PurchaseOrderDetail::where('product_id', $request->product_id)->where('purchase_order_id', $po_id)->get();

        if(!blank($curr_detail)){
            return redirect('/po/edit/'.$po_id)->with('failed', 'Product already exists');
        }
        else{
            PurchaseOrderDetail::create([
                'purchase_order_id' => $po_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $product->price,
            ]);

            return redirect('/po/edit/'.$po_id)->with('success', 'Product added!');
        }
    }

    public function edit($po_id, $id){
        $po_detail = PurchaseOrderDetail::findOrFail($id);
        return view('po.edit-product', compact('po_detail'));
    }

    public function update(Request $request, $po_id, $id){
        $request->validate([
            'quantity' => 'required',
            // 'price' => 'required',
        ]);

        PurchaseOrderDetail::findOrFail($id)->update([
            'quantity' => $request->quantity,
            // 'price' => $request->price,
        ]);

        return redirect('/po/edit/'.$po_id)->with('success', 'Product has been updated');
    }

    public function delete(Request $request){
        PurchaseOrderDetail::destroy($request->po_detail_id);
        return back()->with('failed', 'Product has been deleted');
    }
}
