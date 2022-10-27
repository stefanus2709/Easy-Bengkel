<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index(){
        $quotations = Quotation::all();
        return view('quotation.index', compact('quotations'));
    }

    public function create(){
        return view('quotation.create',);
    }

    public function store(Request $request){
        $request->validate([
            'customer_name' => 'required',
            'date' => 'required',
        ]);

        Quotation::create([
            'customer_name' => $request->customer_name,
            'date' => $request->date,
            'total_price' => 0,
            'finalized' => false,
        ]);

        $last_quotation = Quotation::orderBy('created_at', 'desc')->first();

        return redirect('/quotation/edit/'.$last_quotation->id)->with('success', 'Quotation has been created');
    }
    public function getProduct($id)
    {
        $product = Product::findOrFail($id)->pluck('selling_price')->first();
        return $product;
    }

    public function edit($id){
        $quotation = Quotation::findOrFail($id);
        $products = Product::all();
        return view('quotation.edit', compact('quotation', 'products'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'customer_name' => 'required',
            'date' => 'required',
        ]);
        Quotation::findOrFail($id)->update([
            'customer_name' => $request->customer_name,
            'date' => $request->date,
            'total_price' => $request->total_price
        ]);
        return redirect('/quotation');
    }

    public function delete(Request $request){
        Quotation::destroy($request->quotation_id);
        return back();
    }

    public function finalize($id){
        $quotation = Quotation::findOrFail($id);
        $quotation_details = QuotationDetail::where('quotation_id', $id)->get();
        $total_price = 0;

        if(count($quotation_details) == 0){
            return redirect('/quotation/edit/'.$quotation->id)->with('failed', 'Cannot finalize, there is no item to stock!');
        }

        foreach ($quotation_details as $detail) {
            $detail->product->update([
                'quantity' => $detail->product->quantity - $detail->quantity,
                'item_sold' => $detail->product->item_sold + $detail->quantity,
            ]);
            $total_price += $detail->quantity * $detail->selling_price;
        }

        $quotation->update([
            'total_price' => $total_price,
            'finalized' => true,
        ]);

        return redirect('/quotation');
    }
}
