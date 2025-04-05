<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('listing');
            $table->string('space');
            $table->string('number');
            $table->date('date');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('type');
            $table->float('area_size');
            $table->integer('size_per_meter');
            $table->string('contact_person');
            $table->string('contact_number'); // Storing as a string to handle different formats
            $table->string('signature_name');
            $table->string('file_url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
