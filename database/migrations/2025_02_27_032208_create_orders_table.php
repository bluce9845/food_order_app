<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'usr_id'
            )->onDelete('cascade');
            $table->foreignId('food_id')->constrained(
                table: 'food', indexName: 'fd_id'
            )->onDelete('cascade');
            $table->integer('count_order')->nullable();
            $table->string('amount_price')->nullable();
            $table->string('order_status')->default('pending')->nullable();
            $table->date('order_date')->nullable();
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