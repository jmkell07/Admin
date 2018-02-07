<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
use Session;

class AdminCategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
         $this->validate($request, [
            'name'=>'required|min:3|unique:categories'
        ]);
        Category::create($request->all());
        Session::flash('alert-success', 'Category "' . $request->name . '" has been added.');
        return redirect('/admin/categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id)->update($request->all());
        Session::flash('alert-success', 'Category "' . $request->name . '" has been updated.');
        return redirect('/admin/categories');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $name = $category->name;
        $category->delete();
        Session::flash('alert-success', 'Category "' . $name . '" has been deleted.');
        return redirect('/admin/categories');
    }
}
