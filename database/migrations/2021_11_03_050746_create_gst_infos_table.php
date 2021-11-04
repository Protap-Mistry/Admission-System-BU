<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGstInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_infos', function (Blueprint $table) {
            $table->id();
            $table->string('gst_roll')->unique();           
            $table->string('gst_unit');
            $table->string('gst_position')->nullable();
            $table->double('gst_math_score', 5, 2)->nullable();
            $table->double('gst_physics_score', 5, 2)->nullable();
            $table->double('gst_chemistry_score', 5, 2)->nullable();
            $table->double('gst_biology_score', 5, 2)->nullable();
            $table->double('gst_english_score', 5, 2)->nullable();
            $table->double('gst_bangla_score', 5, 2)->nullable();
            $table->double('gst_ict_score', 5, 2)->nullable();
            $table->double('gst_accounting_score', 5, 2)->nullable();
            $table->double('gst_business_score', 5, 2)->nullable();
            $table->double('total_score', 5, 2)->nullable();
            $table->string('hsc_roll')->nullable();
            $table->string('hsc_board')->nullable();
            $table->string('hsc_group')->nullable();
            $table->string('hsc_passing_year')->nullable();
            $table->string('stu_division')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gst_infos');
    }
}
