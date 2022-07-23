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
            // id , name , description , price , sale_price , quantity , image , category_id
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->float('price')->unsigned()->default(0);
            $table->float('sale_price')->unsigned()->nullable();
            $table->unsignedSmallInteger('quantity')->default(0);
            $table->string('image')->default('');

            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->constrained()->onUpdate('cascade')->onDelete('cascade');

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('featured')->default(0);
            $table->unsignedBigInteger('views')->default(0)->nullable();
            $table->unsignedBigInteger('sales')->default(0)->nullable();

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