<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function All()
    {
        $doctors = category::all();
        return Api::setResponse('category', $doctors);
    }

    public function getproduct(Request $request)
    {
        $data = product::where('category_id', $request->id) ->get();
        return Api::setResponse('product', $data);
    }
}
