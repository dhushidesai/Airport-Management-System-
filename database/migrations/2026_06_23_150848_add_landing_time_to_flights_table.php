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
    Schema::table('flights', function (Blueprint $table) {
        $table->string('landing_time')->nullable(); 
    });
}

public function down()
{
    Schema::table('flights', function (Blueprint $table) {
        $table->dropColumn('landing_time');
    });
}
};
