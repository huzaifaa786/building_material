<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        category::create($request->all());
        return redirect()->back();
    }
    public function index()
    {
        // Retrieve all users
        $category = category::all();
        // dd($category);
        return view('admin.category.allcategories', ['categories' => $category]);
    }
    public function show()
    {
        // Retrieve all users
        $cateogry = category::all();
        return view('vendor.product.create', ['categories'=> $cateogry]);
    }
    public function update(Request $request)

    {
        $category = category::find($request->id);
        $category->update($request->all());
        return redirect()->back()->with('cong', 'product edit successfully');
    }
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();

        // Redirect the user back to the categories list with a success message
        return redirect()->back()->with('success', 'product deleted successfully');
    }

}
