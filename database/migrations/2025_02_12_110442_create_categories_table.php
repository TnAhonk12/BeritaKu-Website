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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // BIGINT PRIMARY KEY AUTO_INCREMENT
            $table->string('name', 255)->unique();
            $table->string('slug', 255)->unique();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps(); // created_at & updated_at otomatis

            // Foreign key parent_id mengacu ke categories(id)
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
