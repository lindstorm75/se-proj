<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OkrRequest;
use App\User;
use App\Okr;
use Session;
use Illuminate\Support\Facades\Storage;

class OkrRequestController extends Controller
{
    public function index()
    {
        $okrRequests = OkrRequest::all();
        $userModel = User::find(1);
        $okrModel = Okr::find(1);
        return view("OKI.admin.okrRequests.waiting", ["data" => $okrRequests, "userModel" => $userModel, "okrModel" => $okrModel]);
    }

    public function update(Request $request)
    {
        if (OkrRequest::where("id", $request->okr_id)->update($request->only("okr_id", "is_approved")))
        {
            Session::flash("message", "อนุมัติตัวชี้วัดสำเร็จ");
            Session::flash("alertColor", "success");
        }
        else
        {
            Session::flash("message", "เกิดข้อผิดพลาด โปรดลองอีกครั้ง");
            Session::flash("alertColor", "danger");
        }
        return back();
    }

    public function destroy(Request $request)
    {
        $path = OkrRequest::where("id", $request->id)->first()->pdf_path;
        $paths = explode("/", $path);
        $fileName = $paths[sizeof($paths) - 1];
        if (OkrRequest::destroy($request->id))
        {
            Storage::disk("local")->delete("app/public/uploads/".$fileName);
            Session::flash("message", "ปฏิเสธตัวชี้วัดสำเร็จ");
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
