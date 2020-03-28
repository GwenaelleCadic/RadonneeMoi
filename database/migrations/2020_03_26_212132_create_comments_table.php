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
            $table->bigIncrements('id');
            $table->integer("user_id")->unsigned();
            $table->integer("marche_id")->unsigned();
            $table->text("body");
            $table->timestamps();
        });


        Schema::table('comments',function($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('marche_id')->references('id')->on('marches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::dropForeign(['user_id']);
        Schema::dropForeign(['marche_id']);
        Schema::dropIfExists('comments');
    }
}
