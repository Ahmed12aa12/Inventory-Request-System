<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('departments', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('Name_En');
        //     $table->string('Name_Ku');
        //     $table->string('Name_Ar');
        //     $table->integer('faculty_id')->unsigned();
        //     $table->foreign('faculty_id')->references('id')->on('faculties');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
