<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ssc_roll')->nullable();
            $table->string('ssc_group')->nullable();
            $table->string('ssc_board')->nullable();
            $table->string('ssc_passing_year')->nullable();
            $table->double('ssc_gpa', 5, 2)->nullable();
            $table->string('hsc_roll');
            $table->string('hsc_group')->nullable();
            $table->string('hsc_board')->nullable();
            $table->string('hsc_passing_year')->nullable();
            $table->double('hsc_gpa', 5, 2)->nullable();
            $table->boolean('has_hsc_math')->default(0);
            $table->boolean('has_hsc_physics')->default(0);
            $table->boolean('has_hsc_chemistry')->default(0);
            $table->boolean('has_hsc_biology')->default(0);
            $table->boolean('has_hsc_statistics')->default(0);
            $table->boolean('has_hsc_economics')->default(0);
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
        Schema::dropIfExists('academic_infos');
    }
}
