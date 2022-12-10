<?php

namespace App\Http\Controllers;

use App\Models\PurchaseIn;
use App\Models\PurchaseInDetail;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseInDetailController extends Controller
{
    public function create(){

    }

    public function store(Request $request, $po_id){
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);
        $curr_detail = PurchaseInDetail::where('product_id', $request->product_id)->where('purchase_in_id', $po_id);

        if($curr_detail){
            return redirect('/po_in/edit/'.$po_id)->with('failed', 'Product already exists');
        }
        else{
            PurchaseInDetail::create([
                'purchase_in_id' => $po_id,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $product->price,
            ]);

            return redirect('/po_in/edit/'.$po_id)->with('success', 'Product added!');
        }
    }

    public function edit($po_id, $id){
        $po_detail = PurchaseInDetail::findOrFail($id);
        return view('po_in.edit-product', compact('po_detail'));
    }

    public function update(Request $request, $po_id, $id){
        $request->validate([
            'quantity' => 'required',
            'price' => 'required',
        ]);

        PurchaseInDetail::findOrFail($id)->update([
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect('/po_in/edit/'.$po_id)->with('success', 'Product has been updated');
    }

    public function delete(Request $request){
        PurchaseInDetail::destroy($request->po_detail_id);
        return back()->with('failed', 'Product has been deleted');
    }
}
