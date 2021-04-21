<?php

namespace App\Http\Controllers;

use App\Okr;
use Illuminate\Http\Request;

class OkrController extends Controller
{
    public function index()
    {
        $technical = Okr::where("category", "technical")->get();
        $support = Okr::where("category", "support")->get();
        return view("OKI.okr", ["technical" => $technical, "support" => $support]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "category" => "required|string",
            "subject" => "required|string",
            "detail" => "required|string",
            "unit" => "required|string",
        ]);
        Okr::create([
            "category" => $request->category,
            "subject" => $request->subject,
            "detail" => $request->detail,
            "unit" => $request->unit,
            "creator_id" => auth()->user()->id
        ]);
        return redirect()->route("okr");
    }

    public function update(Request $request)
    {
        $request->validate([
            "category" => "required|string",
            "subject" => "required|string",
            "detail" => "required|string",
            "unit" => "required|string",
        ]);
        Okr::where('id', $request->id)->first()->update($request->only("category", "subject", "detail", "unit"));
        return redirect()->route("okr");
    }

    public function destroy($id)
    {
        Okr::destroy($id);
        return redirect()->route("okr");
    }
}