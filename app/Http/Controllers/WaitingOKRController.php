<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WaitingOKRController extends Controller
{
    public function index()
    {
        $waitingOKR = array(
            array(
                "name" => "สมหมาย ใจดี",
                "subject" => "การตํารงตําแหน่งทางวิชาการที่สูงขึ้น",
                "amount" => "ศาสตราจารยย์",
            ),
            array(
                "name" => "สมศรี ดีใจ",
                "subject" => "จํานวนโครงการที่ได้เริ่มดําเนินการการสร้างนวัตกรรมเชิงพาณิชย์",
                "amount" => "1",
            ),
            array(
                "name" => "สมชาย หมายปอง",
                "subject" => "จำนวนโครงการบริการวิชาการที่ทําให้กับชุมชน",
                "amount" => "3",
            ),
        );
        return view("OKI.waiting", ["data" => $waitingOKR]);
    }
}
