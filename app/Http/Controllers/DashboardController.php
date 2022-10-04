<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $brands = Brand::all();
        $products = Product::all();
        $low_products = Product::where('quantity', '<', '5')->get();
        return view('dashboard', compact('products', 'low_products'));
    }
}
