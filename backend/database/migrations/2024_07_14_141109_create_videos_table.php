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
        Schema::create('videos', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->string('description');
            $table->ulid('channel_id');
            $table->unsignedBigInteger('views_count');
            $table->unsignedBigInteger('likes_count');
            $table->unsignedBigInteger('dislikes_count');
            $table->unsignedBigInteger('comments_count');
            $table->unsignedBigInteger('length');
            $table->binary('thumbnail');
            $table->string('video_path');
            $table->timestamps();
            $table->softDeletes('deleted_at', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
