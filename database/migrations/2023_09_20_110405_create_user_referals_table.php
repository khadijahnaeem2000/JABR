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
        Schema::create('user_referals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_Id")->nullable();
            $table->bigInteger("refferedTo_Id")->nullable();
            $table->boolean('IsActive')->nullable();
            $table->boolean('AccountCreated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_referals');
    }
};
