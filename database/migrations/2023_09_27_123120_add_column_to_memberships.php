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
        Schema::table('memberships', function (Blueprint $table) {
            $table->string('DailyTask')->nullable();
           $table->string('PerTaskEarning')->nullable();
            $table->string('RefferalEarning')->nullable();
             $table->string('TreeBonus')->nullable();
              $table->string('PlanEarningLimit')->nullable();
               $table->string('MinimumWithdraw')->nullable();
                $table->string('MinimumDeposit')->nullable();
                 $table->string('TaskComissionForLevelOne')->nullable();
                  $table->string('TaskComissionForLevelTwo')->nullable();
                   $table->string('OneDollarIsEqualTo')->nullable();
             $table->string('OneCentIsEqualTo')->nullable();
              $table->string('PackageValidity')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memberships', function (Blueprint $table) {
            //
        });
    }
};
