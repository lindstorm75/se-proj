<?php

namespace App\Http\Controllers;

use App\Okr;
use Illuminate\Http\Request;

class SelectionController extends Controller
{
    public function index()
    {
        $technical = Okr::where("category", "technical")->get();
        return view("OKI.selection", ["data" => $technical]);
    }
}
