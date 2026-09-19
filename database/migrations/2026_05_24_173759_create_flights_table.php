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
    Schema::create('flights', function (Blueprint $table) {

        $table->id();

        $table->string('flight_no');

        $table->string('airline');

        $table->string('departure');

        $table->string('destination');

        $table->string('departure_time');

        $table->string('gate');

        $table->string('status');

        $table->timestamps();

    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
