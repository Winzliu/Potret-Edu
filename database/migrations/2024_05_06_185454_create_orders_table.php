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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('order_id')->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')
                ->references('user_id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('table_number', 2)->notNullable();
            $table->enum('order_status', ['masak', 'saji', 'selesai', 'batal']);
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