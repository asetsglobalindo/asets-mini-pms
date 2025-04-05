<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('listing_facilities', function (Blueprint $table) {
            $table->foreignId('listing_id')->constrained('listings')->onDelete('cascade');
            $table->foreignId('facility_id')->constrained('facilities')->onDelete('cascade');

            // Composite primary key to avoid duplicates
            $table->primary(['listing_id', 'facility_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('listing_facilities');
    }
};
