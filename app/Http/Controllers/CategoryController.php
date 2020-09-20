<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {return view('pages.category.index');}
    public function create(){return view('pages.category.create');}
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->description = $request->description;
        $category->created_by = session('auth.id');
        $category->save();
        return back()->with('success','Sukses tambah data');
    }
    public function edit(Category $category){return view('pages.category.edit',compact('category'));}
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:255',
        ]);
        $category->update($request->all());
        return back()->with('success','Sukses update data');
        return back()->with('error','tidak ada data yang di update');
    }
    public function destroy(Category $category){
        $category->delete();
        return back();
    }
}
