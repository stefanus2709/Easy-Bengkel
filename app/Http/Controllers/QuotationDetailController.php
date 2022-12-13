<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use Illuminate\Http\Request;

class QuotationDetailController extends Controller
{
    public function store(Request $request, $quotation_id){
        $request->validate([
            'product_id' => 'required',
            'quotation_id' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);
        $curr_detail = QuotationDetail::where('product_id', $request->product_id)->where('quotation_id', $quotation_id)->get();

        if(!blank($curr_detail)){
            return redirect('/quotation/edit/'.$quotation_id)->with('failed', 'Product already exists');
        }
        else{
            QuotationDetail::create([
                'product_id' => $request->product_id,
                'quotation_id' => $quotation_id,
                'quantity' => $request->quantity,
                'selling_price' => $request->selling_price,
            ]);

            return redirect('/quotation/edit/'.$quotation_id)->with('success', 'Product added!');
        }
    }

    public function edit($quotation_id, $id){
        $quotation_detail = QuotationDetail::findOrFail($id);
        return view('quotation.edit-product', compact('quotation_detail'));
    }

    public function update(Request $request, $quotation_id, $id){
        $request->validate([
            'quantity' => 'required',
            // 'selling_price' => 'required',
        ]);

        QuotationDetail::findOrFail($id)->update([
            'quantity' => $request->quantity,
            // 'selling_price' => $request->selling_price,
        ]);

        return redirect('/quotation/edit/'.$quotation_id)->with('success', 'Product has been updated');
    }

    public function delete(Request $request){
        QuotationDetail::destroy($request->quotation_detail_id);
        return back()->with('failed', 'Product has been deleted');
    }
}
