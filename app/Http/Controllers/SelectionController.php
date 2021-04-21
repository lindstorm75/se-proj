<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Okr;
use App\Department;
use Illuminate\Http\Request;
use PDF;

class SelectionController extends Controller
{
    public function index()
    {
        $technical = Okr::where("category", "technical")->get();
        $departments = Department::all();
        return view("OKI.selection", ["data" => $technical, "departments" => $departments]);
    }

    public function store(Request $request)
    {
        // $content = PDF::download()->getOriginalContent();
        // dd($content);
        // $content = $request->file("file")->download();
        // dd($content);
        // Storage::disk('local')->put("OKI.pdf", $content);
    }
}
