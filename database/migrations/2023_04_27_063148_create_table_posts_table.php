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
            $table->string('post_title',255);
            $table->integer('cat_id');
            $table->string('image',255);
            $table->text('summary');
            $table->text('description');
            $table->tinyInteger('status');
            $table->tinyInteger('order');
            $table->string('meta_keyword',255);
            $table->string('meta_description',255);
            $table->integer('user_id')->nullable();
            $table->timestamp('date_public');
            $table->integer('view_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
