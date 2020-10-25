<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            /**
             * colonne rajouté
             */
            $table->string('username');
            $table->integer('phone');
            $table->string('company');
            $table->integer('company_nb');
            $table->string('address');
            $table->string('link_website')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_linkedin')->nullable();
            $table->string('role');
            $table->string('privilege');
            $table->string('active');
            /**
             * fin des collone rajouté
             */
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
