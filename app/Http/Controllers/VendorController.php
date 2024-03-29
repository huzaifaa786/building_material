<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'address' => 'required|max:255',
            'phone' => 'required|numeric',
            'lat' => 'required',
            'lng' => 'required',
        ]);

        Vendor::create($request->all());
        return redirect()->back();
    }

    public function show()
    {
        // Retrieve all users
        $vendor = Vendor::all();
        // dd($vendor);
        return view('admin.vendor.allvendor', ['vendors' => $vendor]);
    }
    public function update(Request $request)

    {
        $vendor = Vendor::find($request->id);
        $vendor->update($request->all());
        return redirect()->back()->with('cong', 'product edit successfully');
    }
    public function delete($id)
    {
        $vendor = Vendor::find($id);
        $vendor->delete();

        // Redirect the user back to the categories list with a success message
        return redirect()->back()->with('success', 'product deleted successfully');
    }
    public function vendorLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::guard('vendor')->attempt($credentials)) {
            //   toastr()->success(' login successfully ');
            return redirect()->intended('vendor/layout');
        }
        // toastr()->error('Incorrect email or password');
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'approve' => 'Wrong password or this account not approved yet.',
        ]);
    }
    public function logout()
    {
        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.auth.loginn');
    }
    public function showProducts($id)
    {
        $vendor = Vendor::find($id);
        $products = $vendor->products;
        // dd($products);
    // dd($vendor->prouct);
        return view('admin.vendor.products', compact('products'));
    }
    public function orderHistory()
{
    $orders = Order::where('vendor_id', auth()->guard('vendor')->user()->id)
        ->orderBy('created_at', 'desc')
        ->get();
    return view('vendor.vendororders.orders', compact('orders'));
}


}
