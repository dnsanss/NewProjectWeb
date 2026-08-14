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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('author_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->string('title');
            $table->string('slug')->unique();

            $table->text('excerpt')->nullable();
            $table->longText('content');

            $table->string('thumbnail')->nullable();

            $table->enum('media_type', [
                'image',
                'video'
            ])->default('image');

            $table->string('video_url')->nullable();

            $table->enum('status', [
                'draft',
                'published'
            ])->default('draft');

            $table->boolean('is_featured')->default(false);

            $table->unsignedBigInteger('views')->default(0);

            $table->timestamp('published_at')->nullable();

            $table->timestamps();

            $table->index('status');
            $table->index('published_at');
            $table->index('is_featured');
            $table->index('views');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
