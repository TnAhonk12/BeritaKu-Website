<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_interactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('article_id');
            $table->enum('action', ['like', 'comment', 'share']);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));

            // Foreign Keys
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_interactions');
    }
};
