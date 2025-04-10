<?php

namespace App\Http\Controllers;

use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    public function store(Request $request, $quotation_id){
        $request->validate([
            'description' => 'required',
            'time' => 'required',
            'price' => 'required',
        ]);

        ServiceDetail::create([
            'quotation_id' => $quotation_id,
            'description' => $request->description,
            'time' => $request->time,
            'price' => $request->price,
        ]);

        return redirect('/quotation/edit/'.$quotation_id)->with('success', 'Mechanic has been updated');
    }

    public function delete(Request $request){
        ServiceDetail::destroy($request->service_detail_id);
        return back()->with('failed', 'Service detail has been deleted');
    }
}
