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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('OrderName')->nullable();
            $table->string('Quantity')->nullable();
            $table->string('TotalPrice')->nullable();
            $table->string('TrackingNumber')->nullable();
            $table->string('Date')->nullable();
            $table->bigInteger("ordertype_Id")->nullable();
            $table->boolean('IsActive')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
