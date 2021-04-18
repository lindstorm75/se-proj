<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignController extends Controller
{
    public function index()
    {
        return view("OKI.admin.assign.assign");
    }

    public function store(Request $request)
    {
        dd($request->only("name", "position", "department"));
    }
}
