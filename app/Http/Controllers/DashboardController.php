<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\PurchaseIn;
use App\Models\Quotation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $brands = Brand::all();
        $products = Product::all();
        $low_products = Product::where('quantity', '<', '5')->get();
        $total_purchase = PurchaseIn::whereMonth('date', now()->month)->sum('total_price');
        $total_sales = Quotation::whereMonth('date', now()->month)->sum('total_price');
        return view('dashboard', compact('products', 'low_products', 'total_purchase', 'total_sales'));
    }
}
