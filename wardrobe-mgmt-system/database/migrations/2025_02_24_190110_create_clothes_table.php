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
        Schema::create('clothes', function (Blueprint $table) {
            $table->id(); // primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to associate with users
            $table->string('name'); // Name of the clothing item (e.g., "Blue Denim Jeans")
            $table->string('category'); // Category of the clothing item (e.g., "Shirt", "Pants", "Shoes")
            $table->string('color'); // Color of the clothing item (e.g., "Blue", "Red", "Black")
            $table->string('size'); // Size of the clothing item (e.g., "S", "M", "L", "42")
            $table->string('season')->nullable(); // Season (e.g., "Summer", "Winter", "All-Season")
            $table->string('brand')->nullable(); // Brand of the clothing item (e.g., "Nike", "Zara")
            $table->text('description')->nullable(); // Optional description of the clothing item
            $table->string('image_url')->nullable(); // URL or path to the image of the clothing item
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clothes');
    }
};
