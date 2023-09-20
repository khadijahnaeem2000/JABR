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
        Schema::create('deposit_amounts', function (Blueprint $table) {
            $table->id();
            $table->string('DepositePurpose')->nullable();
            $table->string('DepositeAmount')->nullable();
            $table->string('DepositAmountDollar')->nullable();
            $table->string('PaymentReciept')->nullable();
            $table->string('TransactionID')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposit_amounts');
    }
};
