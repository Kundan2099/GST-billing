<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GstBill extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "gst_bills";
    protected $primarykey = "id";
    protected $fillable = array(
        "party_id",
        "invoice_date",
        "invoice_no",
        "item_description",
        "total_amount",
        "cgst_rate",
        "sgst_rate",
        "igst_rate",
        "cgst_amount",
        "sgst_amount",
        "igst_amount",
        "tax_amount",
        "net_amount",
        "declaration",
    );

    public function party()
    {
        return $this->belongsTo(Party::class);
        // , 'id', 'party_id'
    }
}
