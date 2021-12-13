<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMulticoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multicourses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('link')->unique();
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail');
            $table->string('channel_name');
            $table->string('channel_id');
            $table->string('slug')->unique();
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
        Schema::dropIfExists('multicourses');
    }
}
