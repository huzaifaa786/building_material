<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'unit' => 'required',
            'stock' => 'required|numeric',
            'image1' => 'required|image',
            'image2' => 'required|image',
            'image3' => 'required|image',
            'description' => 'required|max:255',
            'discount' => 'required|numeric',
        ]);
        product::create([

            'user_id' => auth()->guard('vendor')->user()->id,

            // Add other fields here
        ]+$request->all());

        return redirect()->back();
    }

    public function index()
    {
        $products = product::all();
        return view('vendor.product.allproducts', ['products' => $products,]);
    }
    public function update(Request $request)

    {
        $product = product::find($request->id);
        $product->update($request->all());
        return redirect()->back()->with('cong', 'product edit successfully');
    }
    public function destroy($id)
    {
        $product = product::find($id);
        $product->delete();

        // Redirect the user back to the categories list with a success message
        return redirect()->back()->with('success', 'product deleted successfully');
    }
}
