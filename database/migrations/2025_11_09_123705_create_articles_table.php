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
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('writer_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('summary');
            $table->longText('content');
            $table->string('thumbnail_url')->nullable();
            $table->date('published_at')->nullable();
            $table->boolean('is_popular')->default(false);
            $table->unsignedTinyInteger('popular_page')->nullable();
            $table->timestamps();
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
