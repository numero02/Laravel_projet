<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id'); 
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->string('realization_place');
            $table->integer('duration');
            $table->string('article_state');
            $table->string('link_picture_1')->nullable();
            $table->string('link_picture_2')->nullable();
            $table->string('link_picture_3')->nullable();
            $table->string('link_picture_4')->nullable();
            $table->string('link_picture_5')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('ads');
    }
}
