<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Marche extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marches', function(Blueprint $table) {
            $table->increments('id');
            $table->string('nom',255)->unique();
            $table->string('niveau',30);
            $table->time('temps',4)->default(0);
            $table->string('type');
            $table->string('description');            
            $table->string('region')->default('null');
            $table->integer('denivele')->default(0);
            $table->integer('distance')->default(0);
            $table->integer('user_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('marches',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('marches');
    }
}
