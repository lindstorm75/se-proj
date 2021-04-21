<?php

namespace App\Http\Controllers;

use App\Okr;
use App\Department;
use Illuminate\Http\Request;

class SelectionController extends Controller
{
    public function index()
    {
        $technical = Okr::where("category", "technical")->get();
        $departments = Department::all();
        return view("OKI.selection", ["data" => $technical, "departments" => $departments]);
    }
}
