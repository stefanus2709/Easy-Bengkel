<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }

    // public function create(){
    //     return view('brand.create');
    // }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        Brand::create([
            'name' => $request->name,
        ]);

        return redirect('/brand');
    }

    // public function edit($id){
    //     $brand = Brand::findOrFail($id);
    //     return view('brand.edit', compact('brand'));
    // }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        Brand::findOrFail($request->brand_id)->update([
            'name' => $request->name,
        ]);

        return redirect('/brand');
    }

    public function delete(Request $request){
        Brand::destroy($request->brand_id);
        return back();
    }
}
