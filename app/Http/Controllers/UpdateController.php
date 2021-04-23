<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OkrRequest;
use App\Okr;

class UpdateController extends Controller
{
    public function index()
    {
        $requests = OkrRequest::where("creator_id", auth()->user()->id)->get();
        $okrModel = Okr::find(1);
        return view("OKI.update", compact("requests", "okrModel"));
    }

    public function store(Request $request)
    {
        dd($request->only("detail", "amount"));
    }
}
