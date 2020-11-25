<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowItsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_its', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->integer('user_id');
            $table->string('image');
            $table->string('tags');
            $table->timestamps();
            $table->date('deleted_at');

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
        Schema::dropIfExists('show_its');
    }
}
