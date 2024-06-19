<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgressEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('progress_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('workout_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->integer('duration'); // Время в минутах
            $table->integer('calories_burned'); // Количество калорий
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('progress_entries');
    }
}
