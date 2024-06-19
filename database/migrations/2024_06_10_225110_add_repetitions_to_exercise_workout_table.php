<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRepetitionsToExerciseWorkoutTable extends Migration
{
    public function up()
    {
        Schema::table('exercise_workout', function (Blueprint $table) {
            $table->integer('repetitions')->default(0);
        });
    }

    public function down()
    {
        Schema::table('exercise_workout', function (Blueprint $table) {
            $table->dropColumn('repetitions');
        });
    }
}
