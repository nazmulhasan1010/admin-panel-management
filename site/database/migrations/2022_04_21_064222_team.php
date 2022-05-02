<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Team extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams',function(Blueprint $column){
            $column->bigIncrements('id');
            $column->string('name','200');
            $column->string('title','200');
            $column->string('descryption','1000');
            $column->string('facebook','500')->nullable();
            $column->string('twitter','500')->nullable();
            $column->string('linkedin','500')->nullable();
            $column->string('google','500')->nullable();
            $column->string('dribble','500')->nullable();
            $column->string('image','1000');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
