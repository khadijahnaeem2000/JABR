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
        Schema::create('letter_heads', function (Blueprint $table) {
            $table->id();
             $table->string('Name')->nullable();
              $table->string('Address')->nullable();
               $table->string('ContactInformation')->nullable();
                $table->string('LegalInformation')->nullable();
                 $table->string('AdditionalInformation')->nullable();
                  $table->string('Image')->nullable();
             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_heads');
    }
};
