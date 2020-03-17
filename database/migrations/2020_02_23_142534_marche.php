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
            //$table->integer('createurId');
            $table->string('niveau',30);
            $table->time('temps',4)->default(0);
            $table->string('description',1000);            
            //$table->string('region',150);
            $table->integer('denivele')->default(0);
            $table->integer('distance')->default(0);
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
        Schema::drop('marches');
    }
}
