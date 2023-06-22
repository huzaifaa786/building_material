<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

class VendorController extends Controller
{
    public function allVendors()
    {
        $vendors = Vendor::all();
        return Api::setResponse('vendors', $vendors);
    }

    public function vendorProducts(Request $request)
    {

        $vendor = Vendor::find($request->vendor_id);

   
        $products = $vendor->products;
        $products->vendor = $vendor;

        return Api::setResponse('products', $products);


    }
}
