<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Okr;
use App\Department;
use PDF;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function get()
    {
        $pdf = PDF::loadView('OKI/pdf', ["name" => "สมหมาย ใจดี", "department" => "วิศวกรรมคอมพิวเตอร์"]);
        return @$pdf->stream('OKI/pdf');
    }

    public function generate(Request $request)
    {
        $fullName = $request->full_name;
        $departmentId = $request->department_id;
        $department = Department::where("id", $departmentId)->first()->th_name;
        $position = $request->position;
        $okrId = $request->okr_id;
        $okr = Okr::where("id", $okrId)->first();
        $unit = $okr->unit;
        $subject = $okr->subject;
        $amount = $request["amount-".$okr->id];
        $pdf = PDF::loadView('OKI/pdf', compact("fullName", "department", "position", "subject", "amount", "unit"));
        return @$pdf->stream('OKI/pdf');
    }
}
