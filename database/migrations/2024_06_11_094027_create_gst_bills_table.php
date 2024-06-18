<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gst_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('party_id')->nullable()->references('id')->on('parties');
            $table->date('invoice_date')->nullable();
            $table->string('invoice_no')->nullable();
            $table->text('item_description')->nullable();
            $table->float('total_amount', 10, 2)->nullable();
            $table->float('cgst_rate', 10, 2)->nullable();
            $table->float('sgst_rate', 10, 2)->nullable();
            $table->float('igst_rate', 10, 2)->nullable();
            $table->float('cgst_amount', 10, 2)->nullable();
            $table->float('sgst_amount', 10, 2)->nullable();
            $table->float('igst_amount', 10, 2)->nullable();
            $table->float("tax_amount", 10, 2)->nullable();
            $table->float("net_amount", 10, 2)->nullable();
            $table->text('declaration')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gst_bills');
    }
};
