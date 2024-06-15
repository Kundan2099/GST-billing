<?php

namespace App\Http\Controllers;

use App\Models\GstBill;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GstBillController extends Controller
{

    public function viewGstBillList()
    {
        $bills = GstBill::with('party')->get();
        return view('gst-bill.gst-bill-list', [
            'bills' => $bills
        ]);
    }

    public function viewGstBillCreate()
    {
        $parties = Party::where('party_type', 'client')->orderBy('full_name', 'desc')->get();
        return view('gst-bill.gst-bill-create', [
            'parties' => $parties
        ]);
    }

    public function viewGstBillPrint()
    {
        return view('gst-bill.gst-bill-print');
    }

    public function handleGstBillCreate(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'party_id' => 'required|exists:parties,id',
            'invoice_date' => 'required|date',
            'invoice_no' => 'required|string|max:255',
            'item_description' => 'required|max:250',
            'total_amount' => 'required|numeric',
            'cgst_rate' => 'nullable|min:0|max:100',
            'cgst_amount' => 'numeric|min:0',
            'sgst_rate' => 'nullable|min:0|max:100',
            'sgst_amount' => 'numeric|min:0',
            'igst_rate' => 'nullable|min:0|max:100',
            'igst_amount' => 'numeric|min:0',
            'tax_amount' => 'numeric|min:0',
            'net_amount' => 'required|numeric|min:0',
        ]);

        if ($validation->fails()) {
            // dd($validation->errors()->all());
            return redirect()->back()->withErrors($validation)->withInput();
        }
        
        $client = new GstBill();
        $client->party_id = $request->input('party_id');
        $client->invoice_date = $request->input('invoice_date');
        $client->invoice_no = $request->input('invoice_no');
        $client->item_description = $request->input('item_description');
        $client->total_amount = $request->input('total_amount');
        $client->cgst_rate = $request->input('cgst_rate');
        $client->sgst_rate = $request->input('sgst_rate');
        $client->igst_rate = $request->input('igst_rate');
        $client->cgst_amount = $request->input('cgst_amount');
        $client->sgst_amount = $request->input('sgst_amount');
        $client->igst_amount = $request->input('igst_amount');
        $client->tax_amount = $request->input('tax_amount');
        $client->net_amount = $request->input('net_amount');
        $client->declaration = $request->input('declaration');
        $client->save();

        return redirect()->route('view.gst.bill.list')->with('message', 'Gst Bill successfully created');
    }
}
