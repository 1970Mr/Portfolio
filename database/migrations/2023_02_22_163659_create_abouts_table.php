<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('family');
            $table->string('age');
            $table->string('country');
            $table->string('job');
            $table->string('address');
            $table->string('phone_number');
            $table->string('email');
            $table->string('github');
            $table->string('language');
            $table->integer('experiences');
            $table->integer('projects');
            $table->integer('awards');
            $table->text('resume_file');
            $table->boolean('status');
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
        Schema::dropIfExists('abouts');
    }
};
