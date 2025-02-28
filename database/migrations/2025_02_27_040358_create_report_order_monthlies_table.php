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
        Schema::create('report_order_monthlies', function (Blueprint $table) {
            $table->id();
            $table->integer('monthly_report');
            $table->integer('year_report');
            $table->integer('count_order_from_month');
            $table->integer('count_of_income');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report_order_monthlies');
    }
};