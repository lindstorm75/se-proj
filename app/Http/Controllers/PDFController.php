<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Order;
use App\Okr;
use App\Department;
use PDF;

class PDFController extends Controller
{
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
        return @$pdf->download('OKI/pdf');
    }

    public function getPdf($fileName)
    {   
        dd($fileName);
        return response()->download(storage_path('app/public/uploads/'.$fileName));
    }
}
