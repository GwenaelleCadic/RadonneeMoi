<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password',60);
            $table->string('niveau',30)->default('inconnu');
            $table->integer('region_id')->unsigned();
            $table->string('groupe',5)->default('false');
            $table->string('avatar')->default('default.jpg');
            $table->string('description')->default('Non remplie');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::table('users',function(Blueprint $table){
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->primary('id');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropForeign(['region_id']);
        Schema::dropIfExists('users');
    }
}
