<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tellmeastory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('category', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
 

        Schema::table('section', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::table('story', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
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
