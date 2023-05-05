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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('pro_name',255);
            $table->string('images',255);
            $table->integer('catPro_id');
            $table->integer('price');
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
        Schema::dropIfExists('product');
    }
};
