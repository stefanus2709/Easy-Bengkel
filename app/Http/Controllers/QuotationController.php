<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Quotation;
use App\Models\Mechanic;
use App\Models\Service;
use App\Models\QuotationDetail;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function index(){
        $quotations = Quotation::orderBy('created_at', 'DESC')->get();
        $mechanics = Mechanic::all();
        return view('quotation.index', compact('quotations', 'mechanics'));
    }

    public function store(Request $request){
        $request->validate([
            'date' => 'required',
        ]);

        Quotation::create([
            'mechanic_id' => $request->mechanic_id,
            'customer_name' => $request->customer_name,
            'date' => $request->date,
            'total_price' => 0,
            'total_profit' => 0,
            'finalized' => false,
        ]);

        $last_quotation = Quotation::orderBy('created_at', 'desc')->first();

        return redirect('/quotation/edit/'.$last_quotation->id)->with('success', 'Quotation has been created');
    }

    public function edit($id){
        $quotation = Quotation::findOrFail($id);
        $products = Product::where('quantity', '!=', 0)->get();
        $mechanics = Mechanic::all();
        return view('quotation.edit', compact('quotation', 'products', 'mechanics'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'date' => 'required',
        ]);
        Quotation::findOrFail($id)->update([
            'mechanic_id' => $request->mechanic_id,
            'customer_name' => $request->customer_name,
            'date' => $request->date,
        ]);
        return redirect('/quotation/edit/'.$id)->with('success', 'Quotation has been updated');
    }

    public function delete(Request $request){
        Quotation::destroy($request->quotation_id);
        return back();
    }

    public function finalize($id){
        $quotation = Quotation::findOrFail($id);
        $price = 0;
        $total_price = 0;
        $total_profit = 0;
        $total_service = 0;

        if(count($quotation->details) == 0){
            return redirect('/quotation/edit/'.$quotation->id)->with('failed', 'Cannot finalize, there is no item to data!');
        }

        // foreach ($quotation->details as $detail) {
        //     if($detail->product->quantity - $detail->quantity < 0)
        //         return redirect('/quotation/edit/'.$quotation->id)->with('failed', $detail->product->name.' only have '.$detail->product->quantity.' stock left!');
        // }

        foreach ($quotation->details as $detail) {
            $detail->product->update([
                'quantity' => $detail->product->quantity - $detail->quantity,
                'item_sold' => $detail->product->item_sold + $detail->quantity,
            ]);
            $total_price += $detail->quantity * $detail->selling_price;
            $price += $detail->product->price * $detail->quantity;
            $total_profit = $total_price - $price;
        }

        if($quotation->mechanic_id != null){
            $mechanic = Mechanic::findOrFail($quotation->mechanic_id);
            $mechanic->update([
                'salary' => $mechanic->salary + $quotation->total_service_price($quotation)
            ]);
        }

        $quotation->update([
            'total_price' => $total_price + $quotation->total_service_price($quotation),
            'total_profit' => $total_profit,
            'finalized' => true,
        ]);

        return redirect('/quotation')->with('success', 'Quotation has been finalized');
    }

    public function sales_this_month(){
        $total_sales = Quotation::orderBy('created_at', 'DESC')->whereMonth('date', now()->month)->where('finalized', true)->get();
        return view('quotation.sales_this_month', compact('total_sales'));
    }
}
