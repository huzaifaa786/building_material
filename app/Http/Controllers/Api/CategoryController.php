<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Api;
use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function doctorAll()
    {
        $doctors = category::all();
        return Api::setResponse('categary', $doctors);
    }
}
