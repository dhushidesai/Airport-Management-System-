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
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();
        $table->string('flight_no');
        $table->string('from_location');
        $table->string('to_location');
        $table->time('departure_time');
        $table->time('arrival_time');
        $table->string('gate');
        $table->string('status'); // On Time, Delayed, Boarding
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
