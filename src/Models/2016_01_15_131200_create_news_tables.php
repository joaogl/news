<?php

use jlourenco\base\Database\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTables extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('News', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 150);
            $table->text('body');
            $table->integer('image')->unsigned()->nullable();
            $table->integer('author')->unsigned();
            $table->string('news_list', 150);
            $table->timestamp('release_date')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('image')->references('id')->on('File');
            $table->foreign('author')->references('id')->on('User');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('News');

    }

}
