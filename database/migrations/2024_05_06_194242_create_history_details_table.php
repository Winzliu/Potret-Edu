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
        Schema::create('history_details', function (Blueprint $table) {
            $table->uuid('history_detail_id')->primary();
            $table->uuid('history_id');
            $table->foreign('history_id')
                ->references('history_id')
                ->on('histories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('menu_name')->nullable();
            $table->string('menu_notes')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_details');
    }
};
