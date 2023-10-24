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
        Schema::table('tasks', function (Blueprint $table) {
                 $table->string('Description')->nullable();
                      $table->string('Link')->nullable();
                           $table->string('Amount')->nullable();
                                $table->string('Level')->nullable();
                                     $table->string('Commission')->nullable();
                                          $table->string('MembershipTypeId')->nullable();
                                               $table->string('MmebershipId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
};
