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
        Schema::create('image_product', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('filename')->nullable(false)->unique(true);
            $table->string('path')->nullable(false)->unique(true);
            $table->string('url')->nullable(false)->unique(true);
            $table->enum('type', ['png', 'jpg', 'jpeg']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('image_product');
    }
};
