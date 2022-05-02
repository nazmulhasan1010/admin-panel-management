<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',function(Blueprint $column){
            $column->bigIncrements('id');
            $column->string('ip','1000');
            $column->string('email','100');
            $column->string('pass','16');
            $column->string('first_name','15');
            $column->string('last_name','15');
            $column->string('profile','1000');
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
