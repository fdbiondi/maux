<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Registro de Usuario a Materia en un Curso (Estado del Alumno en Materia (para un curso))
        Schema::create('subjects_registration', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mark')->nullable()->default(null);
            $table->enum('status', ['pending', 'studying', 'approved'])->default('studying');

            $table->unsignedInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');

            $table->unsignedInteger('course_registration_id');
            $table->foreign('course_registration_id')->references('id')->on('courses_registration');

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
        Schema::dropIfExists('subjects_registration');
    }
}
