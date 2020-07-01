<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavpostTable extends Migration
{
    public function up()
    {
        Schema::create('user_favpost', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('favpost_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('favpost_id')->references('id')->on('microposts')->onDelete('cascade');

            $table->unique(['user_id', 'favpost_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_favpost');
    }
}
