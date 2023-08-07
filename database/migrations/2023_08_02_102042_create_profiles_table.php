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
        Schema::create('profiles', function (Blueprint $table) {
            //one to one relationship
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete(); //عشان نعرف علاقة 1 تو 1 لازم تعطي الفورينكي يونيك
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender',['male','female'])->nullable();
            $table->date('birthday')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->char('country_code',2)->nullable();
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
        Schema::dropIfExists('profiles');
    }
};
