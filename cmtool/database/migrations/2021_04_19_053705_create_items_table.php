<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id('item_id');
            $table->string('item_name');
            $table->integer('category');
            $table->string('model');
            $table->string('serial')->nullable();
            $table->string('ip');
            $table->string('netmask');
            $table->string('gateway');
            $table->integer('customer_id');
            $table->integer('site_id');
            $table->string('place')->nullable();
            $table->integer('maker_id');
            $table->string('memo')->nullable();
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
        Schema::dropIfExists('items');
    }
}
