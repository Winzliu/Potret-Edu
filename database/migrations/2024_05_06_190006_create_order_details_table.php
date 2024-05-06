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
        Schema::create('order_details', function (Blueprint $table) {
            $table->uuid('order_detail_id')->primary();
            $table->uuid('order_id');
            $table->foreign('order_id')
                ->references('order_id')
                ->on('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->uuid('menu_id');
            $table->foreign('menu_id')
                ->references('menu_id')
                ->on('menus')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('quantity')->notNullable();
            $table->string('notes');
            $table->enum('menu_status', ['kosong', 'masak', 'selesai']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
