<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use Illuminate\Http\Request;

class QuotationDetailController extends Controller
{
    public function index(){

    }

    public function create(){

    }

    public function store(Request $request, $quotation_id){
        $request->validate([
            'product_id' => 'required',
            'quotation_id' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);

        QuotationDetail::create([
            'product_id' => $request->product_id,
            'quotation_id' => $quotation_id,
            'quantity' => $request->quantity,
            'selling_price' => $product->selling_price,
        ]);

        return redirect('/quotation/edit/'.$quotation_id);
    }

    public function edit($quotation_id, $id){
        $quotation_detail = QuotationDetail::findOrFail($id);
        return view('quotation.edit-product', compact('quotation_detail'));
    }

    public function update(Request $request, $quotation_id, $id){
        $request->validate([
            'quantity' => 'required',
            'price' => 'required',
        ]);

        QuotationDetail::findOrFail($id)->update([
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect('/quotation/edit/'.$quotation_id);
    }

    public function delete(Request $request){
        QuotationDetail::destroy($request->quotation_detail_id);
        return back();
    }
}
