<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index(){
        $quotation = Quotation::all();
        return view('quotation.index', compact('quotation'));
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
            'finalized' => 0,
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

    public function delete(){
        
    }
}
