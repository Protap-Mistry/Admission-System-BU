<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoosenSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choosen_subjects', function (Blueprint $table) {
            $table->id();
            $table->string('subj_name')->nullable();
            $table->string('subj_code')->unique();
            $table->string('rank_1')->nullable();
            $table->string('rank_2')->nullable();
            $table->string('rank_3')->nullable();
            $table->string('rank_4')->nullable();
            $table->string('rank_5')->nullable();
            $table->string('rank_6')->nullable();
            $table->string('rank_7')->nullable();
            $table->string('rank_8')->nullable();
            $table->string('rank_9')->nullable();
            $table->string('rank_10')->nullable();
            $table->string('rank_11')->nullable();
            $table->string('rank_12')->nullable();
            $table->string('rank_13')->nullable();
            $table->string('rank_14')->nullable();
            $table->string('rank_15')->nullable();
            $table->string('rank_16')->nullable();
            $table->string('rank_17')->nullable();
            $table->string('rank_18')->nullable();
            $table->string('rank_19')->nullable();
            $table->string('rank_20')->nullable();
            $table->string('rank_21')->nullable();
            $table->string('rank_22')->nullable();
            $table->string('rank_23')->nullable();
            $table->string('rank_24')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('choosen_subjects');
    }
}
