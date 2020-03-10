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
            $table->string('remarque',1000);            
            //$table->string('region',150);
            $table->float('denivele',5,0)->default(0);
            $table->float('distance',5,1)->default(0);
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
