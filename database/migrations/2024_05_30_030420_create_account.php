<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->increments('id_account');
            $table->integer('id_role');
            $table->string('username',255);
            $table->string('fullname',255);
            $table->string('email',255);
            $table->string('phone',11)->nullable();
            $table->string('address',255)->nullable();
            $table->text('password');
            $table->tinyIncrements('is_online');
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
        Schema::dropIfExists('account');
    }
}
