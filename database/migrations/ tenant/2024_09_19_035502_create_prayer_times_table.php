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
        Schema::create('prayer_times', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('prayer_name', ['Fajr', 'Dhuhr', 'Asr', 'Maghrib', 'Isha', 'Jumu`ah']);
            $table->time('time');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prayer_times');
    }
};
