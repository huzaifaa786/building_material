<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function allVendors()
    {
        $vendors = Vendor::all();
        return Api::setResponse('vendors', $vendors);
    }
}
