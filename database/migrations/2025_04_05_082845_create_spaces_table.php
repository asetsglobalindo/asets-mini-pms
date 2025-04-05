<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('spaces', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained('listings')->onDelete('cascade');
            $table->foreignId('space_category_id')->constrained('space_category')->onDelete('cascade');
            $table->string('name');
            $table->string('code');
            $table->decimal('space_size', 10, 2); // for decimals like 100.50
            $table->enum('price_type', ['m2', 'Lot']);
            $table->enum('min_period', ['Hari', 'Bulan', 'Tahun']);
            $table->integer('price');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spaces');
    }
};
