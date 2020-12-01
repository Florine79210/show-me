<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('show_it_id');
            $table->text('content');
            $table->text('image')->nullable();
            $table->integer('user_id');
            $table->string('tags')->nullable();
            $table->timestamps();
            $table->date('deleted_at')->nullable();

            $table->foreign('show_it_id')->references('id')->on('show_its');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
