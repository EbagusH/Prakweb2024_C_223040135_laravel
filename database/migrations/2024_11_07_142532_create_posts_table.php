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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('author_id')->constrained(
                table: 'users',
                indexName: 'posts_author_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'categories',
                indexName: 'posts_acategory_id'
            );
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('body');
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->text('excerpt')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');

        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('excerpt');
        });
    }
};
