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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name_recipient');
            $table->string('addressline_1');
            $table->string('addressline_2');
            $table->unsignedBigInteger('address_type')->default(1);
            $table->timestamps();
            $table->softDeletes();

        });
        Schema::create('address_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); //= samentrekking tabel (enkelvoud) en zijn id
            $table->unsignedBigInteger('address_id');
            $table->timestamps();
            $table->unique(['user_id' , 'address_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //user_id refereert naar id op tabel users en bij delete van user moet relatie ook deleted worden
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
