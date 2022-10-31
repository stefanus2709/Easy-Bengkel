<?php

namespace App\Http\Controllers;

use App\Models\ServiceDetail;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{
    public function store(Request $request, $quotation_id){
        $request->validate([
            'service_id' => 'required',
            'quotation_id' => 'required',
        ]);

        ServiceDetail::create([
            'service_id' => $request->service_id,
            'quotation_id' => $quotation_id,
        ]);

        return redirect('/quotation/edit/'.$quotation_id);
    }

    public function delete(Request $request){
        ServiceDetail::destroy($request->service_detail_id);
        return back();
    }
}
