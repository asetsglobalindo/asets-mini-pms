<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('listing_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained('listings')->onDelete('cascade');
            $table->string('photos'); // stores the file name or URL
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listing_photos');
    }
};
