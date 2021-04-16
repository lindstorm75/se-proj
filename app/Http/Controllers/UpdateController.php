<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function index()
    {
        return view("OKI.update");
    }

    public function store(Request $request)
    {
        dd($request->only("detail", "amount"));
    }
}
