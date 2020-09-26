<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomingItemDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcoming_item_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('outcoming_item_id');
            $table->foreignId('item_id');
            $table->bigInteger('price');
            $table->bigInteger('quantity');
            $table->bigInteger('total');
            // $table->string('description');
            $table->foreign('outcoming_item_id')->references('id')->on('outcoming_items');
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
        Schema::dropIfExists('outcoming_item_details', function (Blueprint $table) {
            $table->dropForeign('outcoming_item_details_outcoming_item_id_foreign');
            $table->dropForeign('outcoming_item_details_item_id_foreign');
        });
    }
}
