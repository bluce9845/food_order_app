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
        Schema::create('order_proces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained(
                table: 'orders', indexName: 'odr_id'
            )->onDelete('cascade');
            $table->foreignId('user_admin_id')->constrained(
                table: 'users', indexName: 'admn_id'
            )->onDelete('cascade');
            $table->string('status_order_process');
            $table->date('date_order_process');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_proces');
    }
};