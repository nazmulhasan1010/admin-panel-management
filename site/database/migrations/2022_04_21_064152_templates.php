<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Templates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates',function(Blueprint $column){
            $column->bigIncrements('id');
            $column->string('project_name','200');
            $column->string('category','200');
            $column->string('designer','100');
            $column->string('post_id','500');
            $column->string('img_link','1000');
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
