<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories',function(Blueprint $table){
            $table->id();//id BIGINT unsigned Auto_increment Primary key
            $table->string('name',255);//VARCHAR
            //created_at ,updated_at : TimeStamp
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
        Schema::dropIfEcists('categories');
    }
};
