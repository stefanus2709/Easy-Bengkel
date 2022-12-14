<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\PurchaseIn;
use App\Models\Quotation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $brands = Brand::all();
        $products = Product::all();
        $quotations = Quotation::all();
        $purchaseIns = PurchaseIn::all();
        $suppliers = Supplier::all();
        $total_asset = Product::total_assets($products);

        $assets = Product::where('quantity', '!=', '0')->get();
        $total_profit = Quotation::all()->sum('total_profit');
        $total_income = $quotations->sum('total_price');
        $total_expense = $purchaseIns->sum('total_price');
        $low_products = Product::where('quantity', '<=', '5')->get();
        $best_products = $products->sortByDesc('item_sold')->where('item_sold', '!=', 0);
        $today_purchases = $purchaseIns->where('date', Carbon::now('Asia/Phnom_Penh')->format('Y-m-d'));
        $today_quotations = $quotations->where('date', Carbon::now('Asia/Phnom_Penh')->format('Y-m-d'));

        return view('dashboard.dashboard', compact('total_profit', 'total_income', 'total_expense', 'products',
        'low_products', 'assets', 'total_asset', 'best_products','quotations', 'today_quotations', 'today_purchases', 'suppliers'));
    }
}