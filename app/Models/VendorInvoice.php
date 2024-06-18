<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorInvoice extends Model
{
    use HasFactory;

    protected $table = 'vendor_invoices';

    protected $fillable = [
        'party_id',
        'invoice_date',
        'invoice_no',
        'item_description',
        'total_amount',
        'declaration',
        'account_holder_name',
        'account_no',
        'bank_name',
        'ifsc_code',
        'branch_address',
    ];

    protected $casts = [
        'total_amount' => 'float', // Cast total_amount to float
    ];

}
