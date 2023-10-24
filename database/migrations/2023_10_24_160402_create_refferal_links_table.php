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
        Schema::create('refferal_links', function (Blueprint $table) {
            $table->id();
              $table->string('UserId')->nullable();
                $table->string('RefferalId')->nullable();
                  $table->string('RefferalCode')->nullable();
                    $table->string('JoinDate')->nullable();
                      $table->string('Status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refferal_links');
    }
};
