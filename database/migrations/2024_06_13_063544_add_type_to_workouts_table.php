<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToWorkoutsTable extends Migration
{
    public function up()
    {
        Schema::table('workouts', function (Blueprint $table) {
            $table->string('type')->nullable();
        });
    }

    public function down()
    {
        Schema::table('workouts', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
