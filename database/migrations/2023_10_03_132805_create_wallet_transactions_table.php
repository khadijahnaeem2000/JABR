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
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('UserId')->nullable();
             $table->string('WalletId')->nullable();
              $table->string('DepositAmount')->nullable();
               $table->string('DepositTo')->nullable();
                $table->string('DepositFrom')->nullable();
                 $table->string('Status')->nullable();
              
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
