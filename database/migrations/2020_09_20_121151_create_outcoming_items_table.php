<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutcomingItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outcoming_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->dateTime('process_date');
            $table->bigInteger('ppn');
            $table->bigInteger('grand_total');
            $table->bigInteger('final_total');
            $table->string('description');
            $table->foreignId('created_by');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
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
        Schema::dropIfExists('outcoming_items', function (Blueprint $table) {
            $table->dropForeign('outcoming_items_customer_id_foreign');
            $table->dropForeign('outcoming_items_created_by_foreign');
        });
    }
}
