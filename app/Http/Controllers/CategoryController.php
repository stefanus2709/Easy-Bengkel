<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function create(){
        return view('category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect('/category')->with('success', 'Category has been created');
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::findOrFail($id)->update([
            'name' => $request->name,
        ]);

        return redirect('/category');
    }

    public function delete(Request $request){
        Category::destroy($request->category_id);
        return back();
    }
}
