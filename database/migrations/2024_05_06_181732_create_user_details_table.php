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
        Schema::create('user_details', function (Blueprint $table) {
            $table->uuid('user_detail_id')->primary();
            $table->uuid('user_id');
            $table->string('name', 200)->notNullable();
            $table->string('custom');
            $table->string('position');
            $table->string('description');
            $table->string('phone_number', 14)->notNullable();
            $table->date('employment_date')->notNullable();
            $table->string('address')->notNullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};