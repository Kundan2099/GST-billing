<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GstBillController extends Controller
{
    public function addBill() {
        return view('gst-bill.gst-bill-create');
    }

    public function manageBill() {
        return view('gst-bill.gst-bill-manage');
    }

    public function printBill() {
        return view('gst-bill.gst-bill-print');
    }
}
