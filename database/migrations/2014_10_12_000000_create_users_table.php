<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name_En');
            $table->string('Name_Ar');
            $table->string('Name_Ku');
            $table->timestamps();
        });
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Name_En');
            $table->string('Name_Ku');
            $table->string('Name_Ar');
            $table->integer('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->default('text');
            $table->string('Name_En')->nullable()->default('text');
            $table->string('Name_Ku')->nullable()->default('text');
            $table->string('Name_Ar')->nullable()->default('text');
            $table->string('Phone', 12)->default('xxxxxxxxx');
            $table->integer('Dep_id')->unsigned()->nullable();
            $table->foreign('Dep_id')->references('id')->on('departments')->onDelete('cascade');
            $table->string('google_id')->nullable()->default('text');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
