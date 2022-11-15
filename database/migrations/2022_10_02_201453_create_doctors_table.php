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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unique();
            $table->string('doctor_name');
            $table->string('gender');
            $table->bigInteger('doctor_nationalities')->unsigned();
            $table->foreign('doctor_nationalities')->references('id')->on('nationalities')->onDelete('cascade');
            $table->bigInteger('doctor_sections')->unsigned();
            $table->foreign('doctor_sections')->references('id')->on('sections')->onDelete('cascade');
            $table->string('specialization');
            $table->text('qualification');
            $table->string('ages');
            $table->string('except')->nullable();
            $table->text('cases');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('doctors');
    }
};
