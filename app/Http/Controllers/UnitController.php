<?php

namespace App\Http\Controllers;

use App\Models\unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function storee(Request $request)
    {
        unit::create($request->all());
        return redirect()->back();
    }
}
