<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\VendorInvoice;
use Illuminate\Http\Request;

class VendorInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function viewVendorCreate()
    {
        return view('vendor-invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function handleVendorCreate(Request $request)
    {
        $party = Party::where('party_type', 'vendor')
            ->where([
                'full_name' => $request->full_name,
                'phone_no' => $request->phone_no
            ])
            ->first();

        if (!empty($party)) {
            $party_id = $party->id;
        } else {

            $party = new Party();
            $party->party_type = 'vendor';
            $party->full_name = $request->input('full_name');
            $party->phone_no = $request->input('phone_no');
            $party->address = $request->input('address');
            $party->account_holder_name = $request->input('account_holder_name');
            $party->account_no = $request->input('account_no');
            $party->bank_name = $request->input('bank_name');
            $party->ifsc_code = $request->input('ifsc_code');
            $party->branch_address = $request->input('branch_address');
            $party->save();

            $party_id = $party->id;
        }

        $invoice = new VendorInvoice();
        $invoice->party_id = $party_id;
        $invoice->account_holder_name = $request->account_holder_name;
        $invoice->invoice_no = $request->invoice_no;
        $invoice->account_no = $request->account_no;
        $invoice->bank_name = $request->bank_name;
        $invoice->ifsc_code = $request->ifsc_code;
        $invoice->branch_address = $request->branch_address;
        $invoice->item_description = $request->item_description;
        $invoice->total_amount = $request->total_amount;
        $invoice->declaration = $request->declaration;
        $invoice->invoice_date = $request->invoice_date;
        // $invoice->created_at = Carbon::now();
        $invoice->save();

        if ($invoice->id) {
            return redirect()->route('view.print.list', [$invoice->id]);
        } else {
            return redirect()->back()->with('message', 'Something went wrong, please try again');
        }
    }

    /**
     * Display the specified resource.
     */
    public function viewPrintCreate(string $id)
    {
        $invoice = VendorInvoice::where('id', $id)->first();
        return view('vendor-invoice.print', ['invoice' => $invoice]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
