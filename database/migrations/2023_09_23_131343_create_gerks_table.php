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
        Schema::create('gerks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("pid")->unique();
            $table->integer("type");
            $table->integer("area");
            $table->foreignId("farm_id")->references("id")->on("farms");
            $table->string("scheme_type")->default(\App\Enum\SchemeType::EXTENSIVE_GRASSLAND)->nullable();
            $table->boolean("is_pasture")->default(true);
            $table->integer("number_of_mowings")->nullable();
            $table->foreignId("block_id")->nullable();
            $table->float("average_altitude")->nullable();
            $table->float("average_slope_percentage")->nullable();
            $table->float("average_exposition")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gerks');
    }
};
