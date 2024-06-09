<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id_order');
            $table->integer('id_account');
            $table->integer('code');
            $table->string('fullname',255);
            $table->string('phone',11);
            $table->string('address',255);
            $table->string('email',255);
            $table->text('note');
            $table->integer('subtotal');
            $table->integer('feeship');
            $table->integer('discount');
            $table->integer('total');
            $table->tinyInteger('payment');
            $table->tinyInteger('status');
            $table->date('date_updated');
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
        Schema::dropIfExists('order');
    }
}
