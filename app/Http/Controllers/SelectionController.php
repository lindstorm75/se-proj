<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Okr;
use App\Department;
use App\File;
use Illuminate\Http\Request;
use Session;
use PDF;

class SelectionController extends Controller
{
    public function index()
    {
        $technical = Okr::where("category", "technical")->get();
        $departments = Department::all();
        return view("OKI.selection", ["data" => $technical, "departments" => $departments]);
    }

    public function continue(Request $request)
    {
        $request->validate([
            "full_name" => "required|string",
            "department_id" => "required|string",
            "position" => "required|string",
            "okr_id" => "required|string",
        ]);
        $okrId = $request->okr_id;
        if (!$request->$request["amount-".$okrId])
        {
            Session::flash("message", "โปรดกรอกข้อมูลให้ครบถ้วน");
            Session::flash("alertColor", "danger");
            return back();
        }
        $full_name = $request->full_name;
        $departmentId = $request->department_id;
        $position = $request->position;
        $amount = $request["amount-".$okrId];
        return view("OKI.seleciton-second", compact("full_name", "departmentId", "position", "okrId", "amount"));
    }

    public function store(Request $request)
    {   
        $fileModel = new File;

        if($request->file())
        {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            Session::flash("message", "เลือกตัวชี้วัดสำเร็จแล้ว โปรดรอการยืนยัน");
            Session::flash("alertColor", "success");

            return redirect()->route("update");
        }
        else
        {
            Session::flash("message", "เกิดข้อผิดพลาด โปรดลองอีกครั้ง");
            Session::flash("alertColor", "danger");
            return redirect()->route("selection");
        }
    }
}
