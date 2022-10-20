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

    public function store(Request $request, $quantity_id){
        $request->validate([
            'product_id' => 'required',
            'quotation_id' => 'required',
            'quantity' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);

        QuotationDetail::create([
            'product_id' => $request->product_id,
            'quotation_id' => $quantity_id,
            'quantity' => $request->quantity,
            'selling_price' => $product->price,
        ]);

        return redirect('/quotation/edit/'.$quantity_id);
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function delete(){
        
    }
}
