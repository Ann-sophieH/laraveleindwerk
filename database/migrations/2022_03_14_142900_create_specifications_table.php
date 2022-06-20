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
        Schema::create('specifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('specifications');
            $table->timestamps();
            $table->softDeletes();

        });
        Schema::create('product_specification',  function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('product_id'); //= samentrekking tabel (enkelvoud) en zijn id
            $table->unsignedBigInteger('specification_id');
            $table->timestamps();
            $table->unique(['product_id' , 'specification_id']);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            //user_id refereert naar id op tabel users en bij delete van user moet relatie ook deleted worden
            $table->foreign('specification_id')->references('id')->on('specifications')->onDelete('cascade');
        });
        Schema::create('category_specification',  function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('category_id'); //= samentrekking tabel (enkelvoud) en zijn id
            $table->unsignedBigInteger('specification_id');
            $table->timestamps();
            $table->unique(['category_id' , 'specification_id']);
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            //user_id refereert naar id op tabel users en bij delete van user moet relatie ook deleted worden
            $table->foreign('specification_id')->references('id')->on('specifications')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specifications');

    }
};
