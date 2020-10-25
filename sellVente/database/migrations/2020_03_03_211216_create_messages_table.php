<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->text('message');
            $table->string('username_sender');
            $table->string('id_sender');
            $table->unsignedBigInteger('id_seller');
            $table->unsignedBigInteger('id_buyer'); 
            $table->unsignedBigInteger('ad_id');
            
            $table->timestamps();
            
            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('cascade');

            $table->foreign('ad_id')
                ->references('id')
                ->on('ads')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
