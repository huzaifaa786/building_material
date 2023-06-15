<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function All()
    {
        $doctors = category::all();
        return Api::setResponse('category', $doctors);
    }
}
