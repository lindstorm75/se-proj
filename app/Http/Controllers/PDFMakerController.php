<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFMakerController extends Controller
{
    public function index()
    {
        return view("OKI.pdf");
    }
}
