<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $brands = Brand::all();
        $products = Product::all();
        $low_products = Product::where('quantity', '<', '5')->get();
        $total_purchase = PurchaseIn::whereMonth('date', now()->month)->sum('total_price');
        return view('dashboard', compact('products', 'low_products', 'total_purchase'));
    }
}
