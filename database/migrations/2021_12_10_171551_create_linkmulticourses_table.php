<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkmulticoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkmulticourses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('multicourse_id');
            $table->string('link');
            $table->string('title');
            $table->string('thumbnail');
            $table->text('description');
            $table->integer('eps');
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
        Schema::dropIfExists('linkmulticourses');
    }
}
