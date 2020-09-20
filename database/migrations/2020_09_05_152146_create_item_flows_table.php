<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemFlowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_flows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id');
            $table->bigInteger('quantity');
            $table->bigInteger('price');
            $table->dateTime('process_date');
            $table->string('description');
            $table->foreignId('created_by');
            $table->timestamps();
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_flows', function (Blueprint $table) {
            $table->dropForeign('item_flows_items_id_foreign');
            $table->dropForeign('item_flows_created_by_foreign');
        });
    }
}
