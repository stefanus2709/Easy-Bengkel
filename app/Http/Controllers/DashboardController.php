<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $brands = Brand::all();
        return view('dashboard', compact('brands'));
    }
}
