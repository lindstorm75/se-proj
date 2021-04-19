<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use PDF;

class PDFController extends Controller
{
    public function get()
    {
        $pdf = PDF::loadView('OKI/pdf');
        return @$pdf->stream('OKI/pdf');
    }
}
