<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_item_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incoming_item_id');
            $table->foreignId('item_id');
            $table->bigInteger('price');
            $table->bigInteger('quantity');
            $table->bigInteger('total');
            $table->string('description');
            $table->foreign('incoming_item_id')->references('id')->on('incoming_items');
            $table->foreign('item_id')->references('id')->on('items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming_item_details', function (Blueprint $table) {
            $table->dropForeign('incoming_item_details_incoming_item_id_foreign');
            $table->dropForeign('incoming_item_details_item_id_foreign');
        });
    }
}
