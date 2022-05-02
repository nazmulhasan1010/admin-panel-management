<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdminPanelevisitor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminpanelvisitors',function(Blueprint $column){
                          $column->bigIncrements('id');
                          $column->string('ip','1000');
                          $column->string('time','1000');
                          $column->string('date','1000');
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
