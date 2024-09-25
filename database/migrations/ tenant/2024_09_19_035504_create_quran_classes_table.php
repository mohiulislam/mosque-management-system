<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('quran_classes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('schedule')->nullable();
            $table->timestamps();
            $table->foreignUuid('teacher_id')->nullable()->constrained('users')->onDelete('set null');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quran_classes');
    }
};
