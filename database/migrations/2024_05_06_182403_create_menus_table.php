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
        Schema::create('menus', function (Blueprint $table) {
            $table->uuid('menu_id')->primary();
            $table->uuid('menu_category_id');
            $table->foreign('menu_category_id')
                ->references('menu_category_id')
                ->on('menu_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('menu_name')->notNullable();
            $table->string('menu_allergen');
            $table->string('menu_description');
            $table->string('menu_price')->nullable();
            $table->string('menu_image')->nullable();
            $table->enum('menu_state', ['aktif', 'tidak_aktif']);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};