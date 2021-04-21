<?php

namespace App\Http\Controllers;

use App\Okr;
use Illuminate\Http\Request;
use Session;

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
        if (Okr::create([
            "category" => $request->category,
            "subject" => $request->subject,
            "detail" => $request->detail,
            "unit" => $request->unit,
            "creator_id" => auth()->user()->id
        ]))
        {
            Session::flash("message", "เพิ่มตัวชี้วัดสำเร็จ");
            Session::flash("alertColor", "success");
        }
        else
        {
            Session::flash("message", "เกิดข้อผิดพลาด โปรดลองอีกครั้ง");
            Session::flash("alertColor", "danger");
        }
        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            "category" => "required|string",
            "subject" => "required|string",
            "detail" => "required|string",
            "unit" => "required|string",
        ]);
        if (Okr::where('id', $request->id)->first()->update($request->only("category", "subject", "detail", "unit")))
        {
            Session::flash("message", "อัปเดตตัวชี้วัดสำเร็จ");
            Session::flash("alertColor", "success");
        }
        else
        {
            Session::flash("message", "เกิดข้อผิดพลาด โปรดลองอีกครั้ง");
            Session::flash("alertColor", "danger");
        }
        return back();
    }

    public function destroy($id)
    {
        if (Okr::destroy($id))
        {
            Session::flash("message", "ลบตัวชี้วัดสำเร็จ");
            Session::flash("alertColor", "success");
        }
        else
        {
            Session::flash("message", "เกิดข้อผิดพลาด โปรดลองอีกครั้ง");
            Session::flash("alertColor", "danger");
        }
        return back();
    }
}