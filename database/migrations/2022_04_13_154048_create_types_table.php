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
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('photo_id');
            $table->string('slug')->unique();
            $table->timestamps();
        });
        Schema::create('product_type', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('type_id'); //= samentrekking tabel (enkelvoud) en zijn id
            $table->unsignedBigInteger('product_id');
            $table->timestamps();
            $table->unique(['product_id' , 'type_id']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            //user_id refereert naar id op tabel users en bij delete van user moet relatie ook deleted worden
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
};
