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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); //default not ull
            $table->string('slug')->unique(); //defined links names insted of numbers and the deferent between this and primary key the pk cant take null but this allow
            //***********relations */
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            // or one line $tabel->foreignId('category_id')->constrained('categories','id');
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->float('price')->default(0);
            $table->float('compare_price')->nullable();

            $table->string('image')->nullable();
            $table->enum('status',['draft','active','archived'])->default('active');
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
        Schema::dropIfExists('products');
    }
};
