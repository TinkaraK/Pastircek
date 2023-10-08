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
        Schema::create('work_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId("gerk_id");
            $table->date("date_from");
            $table->date("date_to")->nullable();
            $table->string("type");
            $table->float("area")->nullable();
            $table->string("remarks")->nullable();
            $table->integer("number_of_sheep")->nullable();
            $table->integer("number_of_hay_bales")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_tasks');
    }
};
