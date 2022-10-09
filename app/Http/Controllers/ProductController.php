<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\VehicleType;
use App\Models\PurchaseInDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create(){
        $categories = Category::all();
        $vehicle_types = VehicleType::all();
        $brands = Brand::all();
        $suppliers = Supplier::all();
        return view('product.create', compact('categories', 'vehicle_types', 'brands', 'suppliers'));
    }

    public function store(Request $request){
        $request->validate([
            'category_id' => 'required',
            'vehicle_type_id' => 'required',
            'brand_id' => 'required',
            'supplier_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'selling_price' => 'required',
            'name' => 'required',
        ]);

        if($request->quantity > 0){
            Product::create([
                'category_id' => $request->category_id,
                'vehicle_type_id' => $request->vehicle_type_id,
                'brand_id' => $request->brand_id,
                'supplier_id' => $request->supplier_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'selling_price' => $request->selling_price,
                'name' => $request->name,
                'available' => 1,
                'item_sold' => 0,
            ]);
        }
        else{
            Product::create([
                'category_id' => $request->category_id,
                'vehicle_type_id' => $request->vehicle_type_id,
                'brand_id' => $request->brand_id,
                'supplier_id' => $request->supplier_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'selling_price' => $request->selling_price,
                'name' => $request->name,
                'available' => 0,
                'item_sold' => 0,
            ]);
        }

        return redirect('/product')->with('success', 'Product has been created');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $vehicle_types = VehicleType::all();
        $brands = Brand::all();
        $suppliers = Supplier::all();
        $product_details = PurchaseInDetail::where('product_id', $id)->get();
        return view('product.edit', compact('product', 'categories', 'vehicle_types', 'brands', 'suppliers', 'product_details'));
    }

    public function update(Request $request){
        $request->validate([
            'category_id' => 'required',
            'vehicle_type_id' => 'required',
            'brand_id' => 'required',
            'supplier_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'selling_price' => 'required',
            'name' => 'required',
        ]);

        Product::findOrFail($request->product_id)->update([
            'category_id' => $request->category_id,
            'vehicle_type_id' => $request->vehicle_type_id,
            'brand_id' => $request->brand_id,
            'supplier_id' => $request->supplier_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'selling_price' => $request->selling_price,
            'name' => $request->name,
        ]);

        return redirect('/product');
    }

    public function delete(Request $request){
        Product::destroy($request->product_id);
        return back();
    }


    public function low_product(){
        $low_products = Product::where('quantity', '<', '5')->get();
        return view('product.low_product', compact('low_products'));
    }
}
