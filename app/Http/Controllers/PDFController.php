<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use PDF;

class PDFController extends Controller
{
    public function pdf()
    {
        $pdf = PDF::loadView('pdf');
        return @$pdf->stream();
    }
}
