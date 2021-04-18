<?php

namespace App\Http\Controllers;

use App\Okr;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $technical = Okr::where("category", "technical")->get();
        $support = Okr::where("category", "support")->get();
        return view("OKI.settings", ["technical" => $technical, "support" => $support]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "subject" => "required|string",
            "detail" => "required|string",
            "unit" => "required|string",
        ]);
        Okr::create([
            "category" => "support",
            "subject" => $request->subject,
            "detail" => $request->detail,
            "unit" => $request->unit
        ]);
        return redirect()->route("settings");
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
        return redirect()->route("settings");
    }
}