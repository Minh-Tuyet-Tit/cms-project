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
        Schema::create('categories_product', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name',255);
            $table->string('images',255);
            $table->tinyInteger('status');
            $table->string('meta_keyword',255);
            $table->string('meta_description',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_product');
    }
};
