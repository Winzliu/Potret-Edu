<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->uuid('history_id')->primary();
            $table->string('cashier_name')->nullable();
            $table->string('waiter_name')->nullable();
            $table->string('table_number', 2)->nullable();
            $table->enum('order_status', ['selesai', 'batal']);
            $table->enum('order_type', ['Dine In', 'Take Away']);
            $table->string('payment_method')->nullable();
            $table->timestamp('payment_date')->nullable();
            $table->integer('total_payment')->nullable();
            $table->float('discount')->nullable();
            $table->float('taxes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
