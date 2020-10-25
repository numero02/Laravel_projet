<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ad_id');
            $table->unsignedBigInteger('id_buyer');
            $table->unsignedBigInteger('id_seller');
            $table->string('state');

            $table->foreign('ad_id')
                ->references('id')
                ->on('ads')
                ->onDelete('cascade');

            $table->foreign('id_seller')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            
            $table->foreign('id_buyer')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

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
        Schema::dropIfExists('purchases');
    }
}
