<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevelToWorkoutsTable extends Migration
{
    /*public function up()
    {
        Schema::table('workouts', function (Blueprint $table) {
            $table->enum('level', ['beginner', 'intermediate', 'advanced'])->after('description');
        });
    }

    public function down()
    {
        Schema::table('workouts', function (Blueprint $table) {
            $table->dropColumn('level');
        });
    }*/
}
